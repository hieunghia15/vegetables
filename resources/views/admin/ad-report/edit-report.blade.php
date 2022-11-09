@extends('admin.layout',[ 'title' => __($title ?? 'Xóa loại báo cáo')])
@section('main')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Duyệt báo cáo</h3>
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
                                <div class="col-md-4">
                                <form action="{{route('admin.ad-report.edit2',['id' => $report->id])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if(($report->processing) == 0)
                                    <select name="processing" class="form-control" >
                                        <option selected="selected" value="0">Chưa duyệt</option>
                                        
                                        <option value="1">Đã duyệt</option>
                                    </select>
                                    @elseif(($report->processing) == 1)
                                    <select name="processing" class="form-control" >
                                        <option value="0">Chưa duyệt</option>
                                        
                                        <option selected="selected"  value="1">Đã duyệt</option>
                                    </select>
                                    @endif
                                    <br>
                                    </div class="form-control">
                                    <button type="submit" class="btn btn-primary"> Ok</button>
                                    </div>
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






