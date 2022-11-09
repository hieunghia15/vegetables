@extends('admin.layout',[ 'title' => __($title ?? 'Xóa nông sản')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Xóa nông sản</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                   
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <h5>Xác nhận xóa</h5>

                                <form action="{{route('admin.products.destroy',['id' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <fieldset class="row merged12">                                                 
                                    <button value="submit" onclick="return confirm('Bạn có muốn xóa nông sản này?');" class="btn btn-danger">Xóa</button>                                   
                                    </fieldset>
                                </form>
                            </div>
                           
                        
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection



