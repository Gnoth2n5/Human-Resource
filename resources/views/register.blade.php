<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng ký</p>
                <form action="{{ url('register_post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name"
                            value="{{ old('name') }}" />
                        <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                    </div>
                    <span style="color:red;" class="duplicate_message">{{ $errors->first('name') }}</span>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" onblur="duplicateEmail(this)" />
                        <div class="input-group-text"><span class="bi bi-envelope-fill"></span></div>
                    </div>
                    <span style="color:red;">{{ $errors->first('email') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control pass" placeholder="Password" name=" password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill" style="cursor: pointer;"></span></div>
                    </div>
                    <span style="color:red;">{{ $errors->first('password') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                            name="confirm_password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <span style="color:red;">{{ $errors->first('confirm_password') }}</span>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Đăng kí</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                <!-- /.social-auth-links -->
                {{-- <p class="mb-1"><a href="{{ url('forgot-password') }}">I forgot my password</a></p> --}}
                <p class="mb-0">
                    <a href="{{ url('/') }}" class="text-center"> Đăng nhập </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });

        const lockIcon = document.querySelector('.bi-lock-fill');

        lockIcon.addEventListener('click', function() {
            const pass = document.querySelector('.pass');
            if (pass.type === 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }
        });

    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
    <script type="text/javascript">
        function duplicateEmail(element) {
            var email = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{ url('checkemail') }}',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    if (res.extists) {
                        $('.duplicate_message').html("Email đã tồn tại.Thử lại");
                    } else {
                        $('.duplicate_message').html("");
                    }
                },
                error: function(jqXHR, exception) {
                  console.log(jqXHR);
                }
            })
        }
    </script>
</body>
<!--end::Body-->

</html>
