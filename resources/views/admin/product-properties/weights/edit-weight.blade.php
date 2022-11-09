@extends('admin.layout',[ 'title' => __($title ?? 'Sửa khối lượng')])
@section('main')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Sửa khối lượng</h3>
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
                                <h5>Nhập khối lượng</h5>
                                <form action="{{route('admin.weights.update',['id' => $weight->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" class="form-control" name="weight" value="{{$weight->weight}}">
                                    
                                    <button value="submit" class="btn btn-primary">Edit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
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


