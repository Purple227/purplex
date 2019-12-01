
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<link href="{{ asset('css/backend/bulma.css') }}" rel="stylesheet">


</head>

<body>

        <form action="{{ route('post.store') }}" method="POST" > <!-- Form tag open -->

          @csrf

<div class="field">
  <label class="label">Title</label>
  <div class="control">
    <input class="input" type="string" placeholder="Text input" name="title">
  </div>
</div>

 <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea" name="description"></textarea>
  </div>
 </div>

 <div class="file has-name is-right">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name">
      Screen Shot 2017-07-29 at 15.54.25.png
    </span>
  </label>
</div>

<div class="select is-multiple">
  <select multiple size="8" name="names[]" multiple required>
    <option value="Argentina">Argentina</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Brazil">Brazil</option>
    <option value="Chile">Chile</option>
    <option value="Colombia">Colombia</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Guyana">Guyana</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Suriname">Suriname</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Venezuela">Venezuela</option>
  </select>
</div>

<label class="checkbox">
  <input type="checkbox" value="0" name="status">
  published
</label>

   <div class="control">
    <button class="button is-link is-light "> Submit </button>
  </div>

        </form>  <!-- Form tag close -->

</body>


</html>























