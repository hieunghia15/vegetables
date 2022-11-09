@extends('admin.layout',[ 'title' => __($title ?? 'Thêm mới bài đăng')])
@section('main')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Tạo mới danh mục</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                            <form method="POST" action="{{route('admin.posts.update',['id'=> $post->id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                    <h5>Nhập tiêu đề</h5>
                                    <input type="text" value="{{$post->title}}" name="title" id="slug" onkeyup="ChangeToSlug();" class="form-control">
                                    <h5>Miêu tả</h5>
                                    <input type="text" value="{{$post->description}}" class="form-control" name="description">
                                    <h5>Nội dung</h5>
                                    <textarea class="form-control" class="form-control" placeholder="Nhập nội dung" id="editor" rows="10" name="content">{{$post->content}}</textarea>
                                    <h5>Hình đại diện</h5>
                                    <input type="file" name="thumbnail" value="{{$post->thumbnail}}" multiple class="form-control" >
                                    <h5>Slug</h5>
                                    <input type="text" name="post_slug" value="{{$post->post_slug}}" id="convert_slug" class="form-control">
                                    <h5>Trạng thái</h5>
                                    @if($is_actived == 0)
                                    <select name="is_actived" class="form-control">
                                        <option value="1">Kích hoạt</option>
                                        <option selected value="0">Không kích hoạt</option>
                                    </select><br>

                                    @elseif($is_actived == 1)
                                    <select name="is_actived" class="form-control">
                                        <option selected value="1">Kích hoạt</option>
                                        <option  value="0">Không kích hoạt</option>
                                    </select><br>
                                    @endif

                                    <h5>Chủ đề<h5>
                                    <select name="category_id" class="form-control" value="{{$post->category_id}}">
                                    @foreach  ($categories as $category)
                                        <option value=" {{$category->id}} ">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                    </select><br>

                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection


<script>
        function ChangeToSlug()
{
    var slug;

    //Lấy text từ thẻ input title
    slug = document.getElementById("slug").value;

    //Đổi chữ hoa thành chữ thường
    slug = slug.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('convert_slug').value = slug;
}
</script>
