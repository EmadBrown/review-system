@extends('welcome')

@section('content')

<div class="columns">
      <div class="column is-3">
        <a class="button is-primary is-block is-alt is-large" href="#">Add Review</a>
      </div>
      <div class="column is-9">
        <div class="box content">
          <article class="post">
            <h4>Bulma: How do you center a button in a box?</h4>
            <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
            <div class="media">
              <div class="media-left">
                <p class="image is-32x32">
                  <img src="http://bulma.io/images/placeholders/128x128.png">
                </p>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="#">@jsmith</a> replied 34 minutes ago  &nbsp; 
                    <span class="tag">Question</span>
                  </p>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
</div>
<div class="column is-12">
        <div class="box content">
          <article class="post">
            <h4>Bulma: How do you center a button in a box?</h4>
            <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
            <div class="media">
              <div class="media-left">
                <p class="image is-32x32">
                  <img src="http://bulma.io/images/placeholders/128x128.png">
                </p>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <a href="#">@jsmith</a> replied 34 minutes ago  &nbsp; 
                    <span class="tag">Question</span>
                  </p>
                </div>
              </div>
            </div>
          </article>
        </div>
</div>

@endsection