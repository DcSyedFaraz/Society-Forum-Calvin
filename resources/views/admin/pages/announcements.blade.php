@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Announcements</h1>
        <p>Welcome {{ auth()->user()->name }}</p>
        <div class="announce">
          <p><span>Today Announcement</span></p>
          <h3>WORK PROFESSIONALLY AND INTELLIGENTLY</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit consequat quam, id rhoncus tortor venenatis quis. Nam sollicitudin ac nisl eu cursus. Donec eget nulla eu ipsum fermentum pretium. Aliquam eget tortor orci. In nec dolor id orci tempor scelerisque a volutpat orci. Donec vulputate varius varius. Pellentesque iaculis lacus vel lorem pharetra pulvinar vitae vel nibh. Nullam quis imperdiet purus. Pellentesque ultrices lacus velit, vel elementum felis feugiat quis. Aliquam tincidunt ipsum eu sem tincidunt tempor. Duis eu porta quam. Integer egestas lacus quis arcu malesuada ullamcorper. Vivamus in leo rutrum, faucibus dui et, vulputate sapien. In hac habitasse platea dictumst.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
