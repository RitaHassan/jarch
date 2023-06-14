<html dir="rtl">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.plugins.css">
    <link rel="stylesheet" href="assets/css/bootstrap.style.css">
</head>
<body>
    <div class="col-lg-5 col-md-9 col-12 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="get" action="/logged-in">
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="mb-3 color-annay-gray">سجل الدخول</h1>
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required form-label fs-6 fw-bolder color-annay-gray">رقم الهوية</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid" type="number" name="idc" autocomplete="off">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="text-center">
                <!--begin::Submit button-->
                <button type="submit" id="sign_in_submit" class="btn btn-lg w-100 mb-5 annay-admin-btn">
                    <span class="indicator-label">دخول</span>
                </button>
                <!--end::Submit button-->
                <!--begin::Separator-->
            </div>
            <!--end::Actions-->
            <div id="login-msg" class="font-family-light"></div>
        </form>
    </div>
</body>
</html>
