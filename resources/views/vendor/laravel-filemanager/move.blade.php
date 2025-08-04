<ul class="nav nav-pills flex-column">
  @foreach($root_folders as $root_folder)
    <li class="nav-item">
      <a class="nav-link" href="#" data-type="0" onclick="moveToNewFolder(this, `{{$root_folder->url}}`)">
        <i class="fa fa-folder fa-fw"></i> {{ $root_folder->name }}
        <div class="items">
          @foreach($items as $i)
            <input type="hidden" id="{{ $i }}" name="items[]" value="{{ $i }}">
          @endforeach
        </div>
      </a>
    </li>
    @foreach($root_folder->children as $directory)
    <li class="nav-item sub-item">
      <a class="nav-link" href="#" data-type="0" onclick="moveToNewFolder(this, `{{$directory->url}}`)">
        <i class="fa fa-folder fa-fw"></i> {{ $directory->name }}
        <div class="items">
          @foreach($items as $i)
            <input type="hidden" id="{{ $i }}" name="items[]" value="{{ $i }}">
          @endforeach
        </div>
      </a>
    </li>
    @endforeach
  @endforeach
</ul>

<script>
  function moveToNewFolder(element, folder) {
    $("#notify").modal('hide');
    var items = [];
    $(element).find('.items input').each(function() { items.push(this.id); });
    performLfmRequest('domove', {
      items: items,
      goToFolder: folder
    }).done(refreshFoldersAndItems);
  }
</script>
