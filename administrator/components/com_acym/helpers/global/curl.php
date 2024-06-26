<?php

function acym_makeCurlCall($url, $fields, $headers = [], $dontVerifySSL = false)
{
    $urlPost = '';
    if (!empty($fields)) {
        foreach ($fields as $key => $value) {
            $urlPost .= $key.'='.urlencode($value).'&';
        }

        $urlPost = trim($urlPost, '&');
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $urlPost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($dontVerifySSL) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    }
    if (!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);

        curl_close($ch);

        return ['error' => $error];
    }

    curl_close($ch);

    return json_decode($result, true);
}

function acym_asyncCurlCall($urls)
{
    if (!function_exists('curl_multi_exec')) return;

    if (!is_array($urls)) $urls = [$urls];

    try {
        $mh = curl_multi_init();

        $handles = [];
        foreach ($urls as $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($mh, $ch);
            $handles[] = $ch;
        }

        $running = null;
        $time = 1;
        do {
            curl_multi_exec($mh, $running);
            usleep(100);
            if ($time > 50000) {
                break;
            }
            $time++;
        } while ($running);

        foreach ($handles as $handle) {
            curl_multi_remove_handle($mh, $handle);
        }
        curl_multi_close($mh);
    } catch (Exception $exception) {
        $config = acym_config();
        $reportPath = $config->get('cron_savepath');
        if (!empty($reportPath)) {
            $reportPath = str_replace(['{year}', '{month}'], [date('Y'), date('m')], $reportPath);
            $reportPath = acym_cleanPath(ACYM_ROOT.trim(html_entity_decode($reportPath)));
            acym_createDir(dirname($reportPath), true, true);

            $lr = "\r\n";
            file_put_contents(
                $reportPath,
                $lr.$lr.'********************     '.acym_getDate(
                    time()
                ).'     ********************'.$lr.'An error occurred while launching the multiple cron system, please make sure the PHP function "curl_multi_exec" is activated on your server: '.$exception->getMessage(
                ),
                FILE_APPEND
            );
        }
    }
}
