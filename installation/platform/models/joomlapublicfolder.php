<?php
/**
 * ANGIE - The site restoration script for backup archives created by Akeeba Backup and Akeeba Solo
 *
 * @package   angie
 * @copyright Copyright (c)2009-2024 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

defined('_AKEEBA') or die();

class AngieModelJoomlaPublicfolder extends AModel
{
	/**
	 * Concrete public folder files generated by Joomla! when enabling public folder.
	 *
	 * @var    string[]
	 * @since  9.8.1
	 */
	private $basicFiles = [
		'defines.php',
		'htaccess.txt',
		'.htaccess',
		'index.php',
		'robots.txt.dist',
		'robots.txt',
		'web.config',
		'web.config.txt',
		'administrator/index.php',
		'api/index.php',
	];

	/**
	 * Concrete folders generated by Joomla! when enabling public folder.
	 *
	 * @var    string[]
	 * @since  9.8.1
	 */
	private $basicFolders = [
		'administrator/components/com_joomlaupdate',
		'administrator/components/com_akeebabackup',
		'administrator/components',
		'administrator',
		'api',
	];

	/**
	 * Basic folder symlinks generated by Joomla! when enabling public folder
	 *
	 * @var    string[]
	 * @since  9.8.1
	 */
	private $basicSymlinks = [
		'administrator/components/com_joomlaupdate/extract.php',
		'administrator/components/com_akeebabackup/restore.php',
		'images',
		'installation',
		'media',
	];

	/**
	 * Make sure the user settings make sense.
	 *
	 * @return  void
	 * @throws  RuntimeException
	 * @since   9.8.1
	 */
	public function checkSettings()
	{
		$usePublic = (bool) $this->getState('usepublic', true);
		$target    = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;

		$isWindows          = substr(strtolower(PHP_OS), 0, 3) === 'win';
		$isServedDirectly   = $this->isServedDirectly();
		$isServedFromPublic = $this->isServedFromPublic();

		$wrongUsePublic = false;

		if ($isWindows)
		{
			$wrongUsePublic = $usePublic === true;
		}
		elseif ($isServedDirectly && !$isServedFromPublic)
		{
			$wrongUsePublic = $usePublic === true;
		}
		elseif ($isServedFromPublic && !$isServedDirectly && !$isWindows)
		{
			$wrongUsePublic = $usePublic === false;
		}

		if ($wrongUsePublic)
		{
			// Wrong Use Public Folder setting
			throw new RuntimeException(AText::_('PUBLICFOLDER_ERR_WRONG_USE_PUBLIC'));
		}

		if (!is_dir($target))
		{
			// Not exist
			throw new RuntimeException(AText::_('PUBLICFOLDER_ERR_PUBLIC_MISSING'));
		}

		if (!is_writeable($target))
		{
			// Unwriteable public folder
			throw new RuntimeException(AText::_('PUBLICFOLDER_ERR_PUBLIC_UNWRITEABLE'));
		}

		if ($usePublic && $target === APATH_SITE)
		{
			// This is not the way to undo the public folder setup, mate
			throw new RuntimeException(AText::_('PUBLICFOLDER_ERR_PUBLIC_IS_ROOT'));
		}

		if (!$usePublic && $target !== APATH_SITE)
		{
			// Just override the user's setting!
			$this->setState('newpublic', APATH_ROOT);
		}
	}

	/**
	 * Returns the information stored in the session.
	 *
	 * @return  array
	 * @since   9.8.1
	 */
	public function getStoredInfo()
	{
		return $this->container->session->get('joomla.angie_public_folder', []);
	}

	/**
	 * Which public folder should I pre-populate the interface with?
	 *
	 * @return  mixed|string|null
	 * @throws  AExceptionApp
	 *
	 * @since   9.8.1
	 */
	public function getDefaultPublicFolder()
	{
		$oldPublic = AngieHelperPublicfolder::getOldPublicFolder();

		return is_dir($oldPublic) ? $oldPublic : $this->getExamplePublicRoot(false);
	}

	/**
	 * Is the restored site currently being served directly, without a separate public folder?
	 *
	 * @return  bool
	 * @since   9.8.1
	 */
	public function isServedDirectly()
	{
		return realpath($this->getExamplePublicRoot(false)) === realpath(APATH_ROOT) && realpath(APATH_ROOT) !== false;
	}

	/**
	 * Is the restored site currently being served through a separate public folder?
	 *
	 * @return  bool
	 * @since   9.8.1
	 */
	public function isServedFromPublic()
	{
		$maybeRoot = $this->getExamplePublicRoot(false);

		if ($maybeRoot === null)
		{
			return false;
		}

		return realpath($maybeRoot) !== realpath(APATH_ROOT) && realpath($maybeRoot) !== false;
	}

	/**
	 * Returns a public root to use in the interface.
	 *
	 * @param   bool  $fallback  Fall back to the example `/var/www/html` if we cannot detect anything better.
	 *
	 * @return  string
	 * @since   9.8.1
	 */
	public function getExamplePublicRoot($fallback = true)
	{
		if (
			isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME'])
			&& @file_exists($_SERVER['SCRIPT_FILENAME'])
		)
		{
			return dirname(dirname($_SERVER['SCRIPT_FILENAME']));
		}

		if (
			isset($_SERVER['PATH_TRANSLATED']) && !empty($_SERVER['PATH_TRANSLATED'])
			&& @file_exists($_SERVER['PATH_TRANSLATED'])
		)
		{
			return dirname(dirname($_SERVER['PATH_TRANSLATED']));
		}

		if (
			isset($_SERVER['CONTEXT_DOCUMENT_ROOT']) && !empty($_SERVER['CONTEXT_DOCUMENT_ROOT'])
			&& @is_dir($_SERVER['CONTEXT_DOCUMENT_ROOT'])
		)
		{
			return $_SERVER['CONTEXT_DOCUMENT_ROOT'];
		}

		if (
			isset($_SERVER['DOCUMENT_ROOT']) && !empty($_SERVER['DOCUMENT_ROOT'])
			&& @is_dir($_SERVER['DOCUMENT_ROOT'])
		)
		{
			return $_SERVER['DOCUMENT_ROOT'];
		}

		return $fallback ? '/var/www/html' : '';
	}

	/**
	 * Delete files when reverting from custom public folder to a regular installation.
	 *
	 * These are generated files which would break the site if they were copied over to the Joomla! installation.
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	public function deleteFilesOnRevertingPublicFolder()
	{
		$usePublic = $this->getState('usepublic', true);
		$target    = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;

		if ($target !== APATH_ROOT)
		{
			return;
		}

		$storedInfo = $this->getStoredInfo();
		$source     = (isset($storedInfo['source']) ? $storedInfo['source'] : null)
			?: (APATH_ROOT . '/external_files/JPATH_PUBLIC');

		$filesToDelete = [
			$source . '/index.php',
			$source . '/defines.php',
			$source . '/administrator/defines.php',
			$source . '/administrator/index.php',
			$source . '/api/defines.php',
			$source . '/api/index.php',
			$source . '/cli/joomla.php',
			$source . '/cli/defines.php',
			APATH_SITE . '/cli/defines.php',
		];

		foreach ($filesToDelete as $filePath)
		{
			if (!@file_exists($filePath))
			{
				continue;
			}

			@unlink($filePath);
		}
	}

	/**
	 * Copy the minimally required files for Joomla to operate
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	public function moveBasicFiles()
	{
		// Get the directory to copy files from
		$storedInfo = $this->getStoredInfo();
		$source     = (isset($storedInfo['source']) ? $storedInfo['source'] : null)
			?: (APATH_ROOT . '/external_files/JPATH_PUBLIC');
		$oldPublic  = (isset($storedInfo['oldPublic']) ? rtrim($storedInfo['oldPublic'], '/\\') : null);
		$oldRoot    = (isset($storedInfo['oldRoot']) ? rtrim($storedInfo['oldRoot'], '/\\') : null);

		// Get the directory to copy files to
		$usePublic = $this->getState('usepublic', true);
		$target    = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;

		// Make sure some basic folders do exist
		foreach ($this->basicFolders as $folder)
		{
			$path = $target . '/' . $folder;

			if (!is_dir($path))
			{
				@mkdir($path, 0755, true);
			}
		}

		// Next up, move Joomla's concrete files
		foreach ($this->basicFiles as $file)
		{
			$sourcePath = $source . '/' . $file;
			$targetPath = $target . '/' . $file;

			// Special case: .htaccess is copied as htaccess.bak, same as if it was extracted w/ Kickstart.
			if ($file === '.htaccess')
			{
				$targetPath = $target . '/htaccess.bak';
			}

			if (!@is_file($sourcePath))
			{
				continue;
			}

			if (@is_file($targetPath) && !@unlink($targetPath))
			{
				continue;
			}

			rename($sourcePath, $targetPath);
		}

		// Move Joomla's symlinks
		foreach ($this->basicSymlinks as $file)
		{
			$sourcePath = $source . '/' . $file;
			$targetPath = $target . '/' . $file;

			if (!@is_link($sourcePath))
			{
				continue;
			}

			// If we are undoing the custom public folder don't bother creating the symlink, just delete it
			if (!$usePublic)
			{
				@unlink($sourcePath);

				continue;
			}

			// The rmdir() is for directory symlinks on Windows.
			if (@is_file($targetPath) && !(@unlink($targetPath) || !@rmdir($targetPath)))
			{
				continue;
			}

			$symlinkTarget = readlink($sourcePath);

			@unlink($sourcePath);

			if ($symlinkTarget === false)
			{
				continue;
			}

			if (strpos($symlinkTarget, $oldRoot) === 0)
			{
				$symlinkTarget = $this->TranslateWinPath(APATH_ROOT . substr($symlinkTarget, strlen($oldRoot)));
			}
			elseif (strpos($symlinkTarget, $oldPublic) === 0)
			{
				$symlinkTarget = $this->TranslateWinPath($target . substr($symlinkTarget, strlen($oldPublic)));
			}

			@symlink($symlinkTarget, $targetPath);
		}

		// Try to delete directories which SHOULD be empty by now.
		foreach ($this->basicFolders as $folder)
		{
			$path = $source . '/' . $folder;

			// It's okay if the folders are not empty. We try that here, so we can make our life easier later.
			@rmdir($path);
		}
	}

	/**
	 * Recursively move files from external_files/JPATH_PUBLIC to the real public folder.
	 *
	 * @param   string  $relativeSource  Path to move, relative to the external_files/JPATH_PUBLIC folder
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	public function recursiveMove($relativeSource = '')
	{
		// Get the directory to copy files from
		$storedInfo = $this->getStoredInfo();
		$newPublic  = (isset($storedInfo['source']) ? $storedInfo['source'] : null)
			?: (APATH_ROOT . '/external_files/JPATH_PUBLIC');
		$oldPublic  = (isset($storedInfo['oldPublic']) ? rtrim($storedInfo['oldPublic'], '/\\') : null);
		$oldRoot    = (isset($storedInfo['oldRoot']) ? rtrim($storedInfo['oldRoot'], '/\\') : null);

		// Get the directory to copy files to
		$usePublic = $this->getState('usepublic', true);
		$target    = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;

		$absoluteFolder = $newPublic . (empty($relativeSource) ? '' : '/') . $relativeSource;

		$di = new DirectoryIterator($absoluteFolder);

		/** @var DirectoryIterator $item */
		foreach ($di as $item)
		{
			if ($item->isDot())
			{
				continue;
			}

			$relativeItemPath = $relativeSource . (empty($relativeSource) ? '' : '/') . $item->getFilename();
			$absoluteSource   = $absoluteFolder . '/' . $relativeItemPath;
			$absoluteTarget   = $target . '/' . $relativeItemPath;

			// Move symlink with path translation
			if ($item->isLink())
			{
				// If we are undoing the custom public folder don't bother creating the symlink, just delete it
				if (!$usePublic)
				{
					@unlink($absoluteSource);

					continue;
				}

				// Make sure the target does not exist
				if (file_exists($absoluteTarget) && !(@unlink($absoluteTarget) || @rmdir($absoluteTarget)))
				{
					continue;
				}

				$symlinkTarget = readlink($absoluteSource);

				@unlink($absoluteSource);

				if ($symlinkTarget === false)
				{
					continue;
				}

				if (strpos($symlinkTarget, $oldRoot) === 0)
				{
					$symlinkTarget = $this->TranslateWinPath(APATH_ROOT . substr($symlinkTarget, strlen($oldRoot)));
				}
				elseif (strpos($symlinkTarget, $oldPublic) === 0)
				{
					$symlinkTarget = $this->TranslateWinPath($target . substr($symlinkTarget, strlen($oldPublic)));
				}

				@symlink($symlinkTarget, $absoluteTarget);

				continue;
			}

			// Move file
			if ($item->isFile())
			{
				$noTarget = true;

				if (file_exists($absoluteTarget))
				{
					$noTarget = @unlink($absoluteTarget) || @rmdir($absoluteTarget);
				}

				if ($noTarget)
				{
					@rename($absoluteSource, $absoluteTarget);
				}
				elseif (@copy($absoluteSource, $absoluteTarget))
				{
					@unlink($absoluteSource);
				}

				continue;
			}

			// Move directory
			if ($item->isDir())
			{
				/**
				 * We prefer to move entire folders all at once.
				 *
				 * This method is very fast, but it doesn't translate internal symlinks. Therefore, we need to avoid
				 * doing that for core Joomla folders and their subdirectories.
				 *
				 * Example: we may have a symlink `administrator/components/com_example/foobar.php` which points to
				 * `<OLD SITE ROOT>/components/com_example/foobar.php`. We need to translate `<OLD SITE ROOT>` to the
				 * restored site's root, therefore we cannot move the entire administrator or administrator/components
				 * tree all at once. We need to recursively copy it, so we can process that internal symlink.
				 *
				 * If you have internal symlinks in non-standard folders, well, I can't help you there. It would be very
				 * slow indeed. Besides, you should not be doing that! You should have a symlink to the top-level
				 * folder, with the concrete folder inside your site's installation. The public folder should really
				 * only be symlinks except for the .htaccess, web.config, and robots.txt files in the public root,
				 * administrator, and api folders. That's all.
				 *
				 * Note that despite that, I am adding `.well-known` as yet another folder we will be iterating instead
				 * of moving all at once because I can foresee legitimate use cases where that may be necessary to
				 * preserve the site owner's sanity at the expense of mine.
				 */
				$standardJoomlaFolders = [
					'.well-known',
					'administrator',
					'api',
					'cache',
					'cli',
					'components',
					'images',
					'includes',
					'language',
					'layouts',
					'libraries',
					'media',
					'modules',
					'plugins',
					'templates',
					'tmp',
				];

				$isStandardJoomlaFolder = array_reduce(
					$standardJoomlaFolders,
					function ($carry, $standardFolder) use ($relativeItemPath) {
						if ($carry)
						{
							return true;
						}

						return
							$relativeItemPath === $standardFolder
							|| substr($relativeItemPath, 0, strlen($standardFolder) + 1) === $standardFolder . '/';
					},
					false
				);

				if (!file_exists($absoluteTarget) && !$isStandardJoomlaFolder)
				{
					if (rename($absoluteSource, $absoluteTarget))
					{
						continue;
					}
				}

				// We could not move it all at once, therefore we have to do a slower, recursive move operation
				$this->recursiveMove($relativeItemPath);

				// At this point the directory should be empty, so we can delete it.
				@rmdir($item->getPathname());

				continue;
			}
		}
	}

	/**
	 * Automatically update the paths in files, e.g. when moving between servers
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	public function autoEditFiles()
	{
		$usePublic         = (bool) $this->getState('usepublic', true);
		$newPublic         = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;
		$isRevertingPublic = $newPublic === APATH_ROOT;

		$fileList = [];

		if (!$isRevertingPublic)
		{
			$fileList = [
				$newPublic . '/index.php',
				$newPublic . '/defines.php',
				$newPublic . '/administrator/index.php',
				$newPublic . '/administrator/defines.php',
				$newPublic . '/api/index.php',
				$newPublic . '/api/defines.php',
				$newPublic . '/cli/index.php',
				$newPublic . '/cli/defines.php',
			];
		}

		$fileList = array_merge(
			$fileList, [
			$newPublic . '/.htaccess',
			$newPublic . '/.htpasswrd',
			$newPublic . '/web.config',
			$newPublic . '/nginx.conf',
			$newPublic . '/administrator/.htaccess',
			$newPublic . '/administrator/.htpasswrd',
			$newPublic . '/administrator/web.config',
			$newPublic . '/administrator/nginx.conf',
			$newPublic . '/api/.htaccess',
			$newPublic . '/api/.htpasswrd',
			$newPublic . '/api/web.config',
			$newPublic . '/api/nginx.conf',
			APATH_ROOT . '/cli/defines.php',
		]
		);

		foreach ($fileList as $filePath)
		{
			$this->editFileContents($filePath);
		}
	}

	/**
	 * Remove the folder where we copied the public folder's files from.
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	public function removeExternalFilesContainerFolder()
	{
		// Make sure the external_files/JPATH_PUBLIC is empty, or just has some empty folders, then delete it
		$storedInfo = $this->getStoredInfo();
		$source     = (isset($storedInfo['source']) ? $storedInfo['source'] : null)
			?: (APATH_ROOT . '/external_files/JPATH_PUBLIC');

		if (!$this->isMostlyEmpty($source))
		{
			return;
		}

		$this->recursiveDeleteFolder($source);

		// Make sure that we don't have to do any off-site folder restoration.
		/** @var AngieModelSteps $stepsModel */
		$stepsModel = AModel::getAnInstance('Steps', 'AngieModel');
		$nextStep   = $stepsModel->getNextStep();

		if ($nextStep['step'] !== 'setup')
		{
			return;
		}

		// Delete the containing folder of the JPATH_PUBLIC subdirectory, unless it's the site's root.
		$source = dirname($source);

		if ($source !== APATH_ROOT)
		{
			$this->recursiveDeleteFolder($source);
		}
	}

	/**
	 * Edit a file's contents to update them with the new paths.
	 *
	 * @param   string  $filePath  The absolute filesystem path of the file to edit.
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	private function editFileContents($filePath)
	{
		// Get the directory to copy files from
		$storedInfo = $this->getStoredInfo();
		$source     = (isset($storedInfo['source']) ? $storedInfo['source'] : null)
			?: (APATH_ROOT . '/external_files/JPATH_PUBLIC');
		$oldPublic  = (isset($storedInfo['oldPublic']) ? rtrim($storedInfo['oldPublic'], '/\\') : null);
		$oldRoot    = (isset($storedInfo['oldRoot']) ? rtrim($storedInfo['oldRoot'], '/\\') : null);
		$usePublic  = (bool) $this->getState('usepublic', true);
		$newPublic  = $usePublic ? $this->getState('newpublic', APATH_ROOT) : APATH_ROOT;
		$newRoot    = APATH_ROOT;

		$substitutions = [];

		if ($oldPublic !== $newPublic)
		{
			$substitutions[$oldPublic] = $newPublic;
		}

		if ($oldRoot !== $newRoot)
		{
			$substitutions[$oldRoot] = $newRoot;
		}

		if (empty($substitutions) || !@is_file($filePath) || !@is_readable($filePath))
		{
			return;
		}

		krsort($substitutions);

		$isPhp = strtolower(substr($filePath, -4)) === '.php';

		$fileContents = @file_get_contents($filePath);

		if ($fileContents === false || empty($fileContents))
		{
			return;
		}

		$from = array_keys($substitutions);
		$to   = array_values($substitutions);

		if ($isPhp)
		{
			$startStringify = function (array $source) {
				$temp = [];

				foreach ($source as $x)
				{
					$temp[] = '"' . $x;
					$temp[] = "'" . $x;
				}

				return $temp;
			};

			$from = $startStringify($from);
			$to   = $startStringify($to);
		}

		$fileContents = str_replace($from, $to, $fileContents, $numReplacements);

		if (!$numReplacements)
		{
			return;
		}

		@file_put_contents($filePath, $fileContents);
	}

	/**
	 * Makes a Windows path more UNIX-like, by turning backslashes to forward slashes.
	 *
	 * @param   string  $path  The path to transform
	 *
	 * @return  string
	 * @since   9.8.1
	 */
	private function TranslateWinPath($path)
	{
		$isWindows = (DIRECTORY_SEPARATOR == '\\');
		$isUNC     = false;

		if ($isWindows)
		{
			// Is this a UNC path?
			$isUNC = (substr($path, 0, 2) == '//');
			// Change potential windows directory separator
			if ((strpos($path, '\\') > 0) || (substr($path, 0, 1) == '\\'))
			{
				$path = strtr($path, '\\', '/');
			}
		}

		// Remove multiple slashes
		$path = str_replace('///', '/', $path);
		$path = str_replace('//', '/', $path);

		// Fix UNC paths
		if ($isUNC)
		{
			$path = '/' . $path;
		}

		return $path;
	}

	/**
	 * Checks if a folder is mostly empty.
	 *
	 * A mostly empty folder is one which is either entirely empty, or has empty subdirectories (no matter how many
	 * levels deep).
	 *
	 * @param   string  $source  The absolute filesystem path of the folder to check for mostly emptiness.
	 *
	 * @return  bool
	 * @since   9.8.1
	 */
	private function isMostlyEmpty($source)
	{
		$di = new DirectoryIterator($source);

		/** @var DirectoryIterator $item */
		foreach ($di as $item)
		{
			if ($item->isDot())
			{
				continue;
			}

			if ($item->isLink() || $item->isFile())
			{
				continue;
			}

			if ($item->isDir() && !$this->isMostlyEmpty($item->getPathname()))
			{
				return false;
			}
		}

		return true;
	}

	/**
	 * Recursively delete a folder and all of its contained files and folders.
	 *
	 * @param   string  $source  The absolute filesystem path of the folder to delete
	 *
	 * @return  void
	 * @since   9.8.1
	 */
	private function recursiveDeleteFolder($source)
	{
		$di = new DirectoryIterator($source);

		/** @var DirectoryIterator $item */
		foreach ($di as $item)
		{
			if ($item->isDot())
			{
				continue;
			}

			if ($item->isLink())
			{
				@unlink($item->getPathname()) || @rmdir($item->getPathname());
			}

			if ($item->isFile())
			{
				@unlink($item->getPathname());
			}

			if ($item->isDir())
			{
				$this->recursiveDeleteFolder($item->getPathname());

				rmdir($item->getPathname());
			}
		}
	}

}
