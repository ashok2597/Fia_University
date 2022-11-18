import tick from "./async";

export function presentVideoPlayer(src, id = new Date().getTime() * Math.random(), container = document.body) {

  // console.log(src);

  // clear previous players
  const existingPlayer = document.querySelector('.video-player');
  if (existingPlayer) {
    existingPlayer.parentElement.removeChild(existingPlayer);
  }

  // construct elements

  const player = document.createElement('section');
  player.setAttribute('id', id);
  player.setAttribute('class', 'video-player');

  const backdrop = document.createElement('span');
  backdrop.setAttribute('class', 'video-player__backdrop');
  player.append(backdrop);

  const iframeContainer = document.createElement('div');
  iframeContainer.setAttribute('class', 'video-player__iframe-container');

  const iframe = document.createElement('iframe');
  iframe.setAttribute('id', id + '__iframe');
  iframe.setAttribute('class', 'video-player__iframe');
  iframe.setAttribute('src', src);
  iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
  iframe.setAttribute('autoplay', 1);
  iframe.setAttribute('frameborder', 0);
  iframe.setAttribute('allowfullscreen', true);

  const closeButton = document.createElement('span');
  closeButton.innerHTML = 'Close ×';
  closeButton.setAttribute('class', 'video-player__close');

  iframeContainer.append(iframe);
  iframeContainer.append(closeButton);

  player.append(iframeContainer);


  container.append(player);
  document.documentElement.classList.add('video-player-open');

  // TO-DO: get trigger element and player size for animation

  // const triggerRect = triggerEl.getBoundingClientRect();
  // const iframeRect = iframe.getBoundingClientRect();
  // console.log(triggerRect, iframeRect);

  // open and add listeners

  setTimeout(async () => {
    player.classList.add('open');
    await tick();
    player.classList.add('opening');
    await tick(380);
    player.classList.remove('opening');
    function close() {
      document.documentElement.classList.remove('video-player-open');
      container.removeChild(player);
    }
    backdrop.addEventListener('click', close, { once: true });
    closeButton.addEventListener('click', close, { once: true });
  });

}