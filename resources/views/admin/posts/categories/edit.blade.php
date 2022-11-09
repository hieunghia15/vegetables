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
                            <form method="POST" action="{{route('admin.posts.categories_update',['id'=> $category->id])}}" enctype="multipart/form-data">
                                @csrf 
                                @method('PATCH')
                                    <h5>Nhập tên danh mục</h5>  
                                    <input type="text" name="name" id="slug" value="{{$category->name}}" onkeyup="ChangeToSlug();" class="form-control">   
                                    <h5>Hình đại diện</h5>
                                    <img src="../../../../../{{$category->thumbnail}}" style="width:60px;height:60px;">                              
                                    <input type="file" name="thumbnail" multiple class="form-control" >
                                    <h5>Slug</h5>                          
                                    <input type="text" name="category_slug" value="{{$category->category_slug}}" id="convert_slug" class="form-control">
                                    <h5>Trạng thái</h5>              
                                    <select class="form-select" aria-label="Default select example" value="{{$category->is_actived}}" name="is_actived">
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Không kích hoạt</option>
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