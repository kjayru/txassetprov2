<div class="encurso__video">
    <div class="encurso__video__titulo">

    </div>
    <div class="encurso__video__player">
          <video
              id="my-player"
              class="video-js"
              controls
              preload="auto"

              poster="/storage/{{@$content->poster}}"
              data-setup="{}"
          >
              <source src="/storage/{{@$content->video}}" type="video/mp4" />

              <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a
              web browser that
              <a href="https://videojs.com/html5-video-support/" target="_blank"
                  >supports HTML5 video</a
              >
              </p>
          </video>

      </div>
</div>
