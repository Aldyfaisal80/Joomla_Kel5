const animation={},parseFrameStart=t=>!t||Number.isNaN(parseInt(t))?0:parseInt(t);function playAction(t,e,a,n,o=!1){o?t||animation[e].playSegments([parseInt(n),parseFrameStart(a)],!0):t||animation[e].playSegments([parseFrameStart(a),parseInt(n)],!0)}const runLottiePlayer=t=>{for(const e of t){const t=t=>["1","true"].includes(t),a=e.getAttribute("id");let n=document.getElementById(a),{loop:o,autoplay:i,mode:r,renderer:s,external:l,direction:c,speed:d,hover_out:m,viewport_bottom:p,viewport_top:u,frame_start:y,frame_end:f}=e.dataset;i=!!t(i),o=!!t(o),"click"===r&&(i=!1),"scroll"!==r&&"hover"!==r||(i=!1,o=!1);let v=1;const w=t=>{t.forEach((t=>{t.isIntersecting&&(animation[a].stop(),playAction(!i,a,y,f),"backward"==c&&(animation[a].stop(),playAction(!i,a,y,f,!0)))}))},b=()=>{new IntersectionObserver(w,{root:null,threshold:.4}).observe(n)},h=t=>{t.preventDefault();let e=n.getBoundingClientRect(),o=window.innerHeight*u/100,i=window.innerHeight*p/100,r=e.top-window.innerHeight,s=0-r+o,l=e.top+o+n.offsetHeight-r+i,c=Math.max(0,Math.min(s/l,1));c=Math.min(100,Math.max(0,(100*c).toFixed(2)));let d=animation[a].firstFrame+(animation[a].totalFrames-animation[a].firstFrame)*c/100;animation[a].totalFrames>=d&&animation[a].goToAndStop(d,!0)},A=t=>{t.preventDefault(),animation[a].stop(),playAction(i,a,y,f),"backward"==c&&(animation[a].stop(),playAction(i,a,y,f,!0))},g=t=>{t.preventDefault(),animation[a].stop(),playAction(i,a,y,f)},k=t=>{switch(t.preventDefault(),m){case"pause":animation[a].pause();break;case"reverse":animation[a].setDirection(v),animation[a].play(),v*=-1;break;default:animation[a].stop(),playAction(i,a,y,f)}},L=()=>{switch(r){case"viewport":b();break;case"scroll":window.addEventListener("scroll",h);break;case"click":e.addEventListener("click",A);break;case"hover":e.addEventListener("mouseenter",g),e.addEventListener("mouseleave",k);break;default:"backward"==c?(animation[a].stop(),playAction(!i,a,y,f,!0)):(animation[a].stop(),playAction(!i,a,y,f))}};animation[a]&&animation[a].destroy(),animation[a]=lottie.loadAnimation({container:n,renderer:s,loop:o,autoplay:i,path:e.getAttribute("src")}),animation[a].setSpeed(d||1),animation[a].addEventListener("DOMLoaded",L)}};window.addEventListener("DOMContentLoaded",(t=>{let e=document.querySelectorAll(".lottie-player");runLottiePlayer(e);new MutationObserver((function(t){for(const e of t){let t=e.addedNodes;if(t)for(const e of t)if("DIV"===e.nodeName){let t=e.querySelectorAll(".lottie-player");runLottiePlayer(t)}}})).observe(document.body,{childList:!0,subtree:!0})}));