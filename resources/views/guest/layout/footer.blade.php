<style>
.footer {
    border-top: 4px solid #48702f;
}

.list-footer ul li a {
    text-decoration: none;
    list-style: none;
    color: black;
}

.list-footer ul li a:hover {
    background-color: #7fad39;
    color: white;
}

.footer__copyright__payment {
    width: 100px;
}

.footer__widget img {
    width: 50px;
    padding-right: 5px;
}

.footer__copyright img {
    width: 30px;
    padding-right: 5px;
}
.pl-900{
    padding-left: 900px;
}
</style>
<footer class="footer spad">
    <div class="ml-5 mr-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="{{route('guest.index')}}"><img src="{{ asset('../image/Logo-footer.png')}}"
                                alt="Nông sản Việt"></a>
                    </div>
                    <ul>
                        <li><i class="fa-solid fa-phone"></i>&emsp;1900565657</li>
                        <li><i class="fa-solid fa-envelope"></i>&emsp;info@nsv.vn</li>
                        <li><i class="fa-solid fa-map-location-dot"></i>&emsp;đường 3/2 DHCT, phường Xuân Khánh, quận
                            Ninh Kiều, Tp. Cần Thơ</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 list-footer">
                <h5 class="left"><b>Chăm sóc khách hàng</b></h5>
                <ul class="list-unstyled text-decorate-none float-left left">
                    <li><a href="#">Trung tâm hỗ trợ</a></li>
                    <li><a href="{{route('guest.news.index')}}">Nông Sản Việt Blog</a></li>
                    <li><a href="#">Quy trình mua bán</a></li>
                    <li><a href="#">Chính sách đổi trả</a></li>
                    <li><a href="#">Chính sách vận chuyển</a></li>
                    <li><a href="#">Giải quyết khiếu nại</a></li>
                    <li><a href="#">Quyền và nghĩa vụ các bên</a></li>
                </ul>
            </div>
            <div class="col-lg-3 list-footer">
                <h5 class="left"><b>Về Nông sản Việt</b></h5>
                <ul class="list-unstyled text-decorate-none float-left left">
                    <li><a href="#">Giới thiệu về Nông Sản Việt</a></li>
                    <li><a href="#">Điều khoản Nông Sản Việt</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Kênh người bán</a></li>
                    <li><a href="#">Liên hệ với truyền thông</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="footer__widget">
                    <h6>Kết nối chúng tôi</h6>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer__widget">
                    <h6>Vận chuyển</h6>
                    <div class="d-flex flex-row p-2 ">
                        <img src="{{ asset('../image/icon/vnpost.jpg')}}" alt="http://www.vnpost.vn/">
                        <img src="{{ asset('../image/icon/ghtk.jpg')}}" alt="https://giaohangtietkiem.vn/">
                        <img src="{{ asset('../image/icon/ghn.jpg')}}" alt="https://ghn.vn/">
                        <img src="{{ asset('../image/icon/ahamove.jpg')}}" alt="https://www.ahamove.com/">
                        <img src="{{ asset('../image/icon/jt.jpg')}}" alt="https://jtexpress.vn/">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy; by NongsanViet <script>
                                document.write(new Date().getFullYear());
                                </script>
                            </p>
                        </div>
                        <div class="d-flex flex-row-reverse pl-900">
                            <img src="{{ asset('../image/icon/vnpay.png')}}" alt="https://ghn.vn/">
                            <img src="{{ asset('../image/icon/vietcom.png')}}" alt="https://www.ahamove.com/">
                            <img src="{{ asset('../image/icon/momo.jpg')}}" alt="https://jtexpress.vn/">
                            <img src="{{ asset('../image/icon/1.png')}}" alt="https://www.ahamove.com/">
                            <img src="{{ asset('../image/icon/2.png')}}" alt="https://jtexpress.vn/">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>