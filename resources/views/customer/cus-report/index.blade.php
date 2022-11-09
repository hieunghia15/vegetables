<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Báo cáo vi phạm')])
    @stack('head')
</head>
<style>
    .main-index {
        background-color: #f5f5f5;
    }

</style>

<body>
    <!-- Header Section Begin -->
    @if (Auth::check())
        @include('guest.layout.header-top-login')
    @else
        @include('guest.layout.header-top-logout')
    @endif
    @include('guest.layout.header-bottom')
    <!-- Contact Form Begin -->
    <div class="contact-form main-index">
        <div class="ml-5 mr-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Báo cáo gian hàng vi phạm</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('customer.cus-report.store2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="farmer_id" value="{{ $farmer_id }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label>Gian hàng:</label>
                        <h5>{{ $farmer->name }}</h5>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label>Vi phạm quy định:</label>
                        <br>
                        <select id="province-dropdown" name="type_report_id">
                            @foreach ($type_reports as $type_report)
                                <option value="  {{ $type_report->id }}">
                                    {{ $type_report->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Nội dung phản ánh vi phạm..." name="messege"></textarea>
                        <button type="submit" class="site-btn">Báo cáo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->


    <!-- Footer Section Begin -->
    @include('guest.layout.footer')
    <!-- Footer Section End -->
    @include('guest.layout.script')

    <form action="{{ route('customer.cus-report.store2') }}" method="POST" enctype="multipart/form-data">
        <legend>Báo cáo xấu</legend>
        @csrf
        <input class="form-control" type="hidden" name="farmer_id" value="{{ $farmer->id }}">
        <div class="form-group">
            <label for="">Loại báo cáo:</label>
            <br>
            <select class="form-control" name="type_report_id">
                @foreach ($type_reports as $type_report)
                    <option value="  {{ $type_report->id }}">
                        {{ $type_report->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Lời nhắn cho quản trị viên:</label>
            <br>
            <textarea name="messege" class="form-control" rows="8"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Báo cáo</button>
    </form>

</body>

</html>
