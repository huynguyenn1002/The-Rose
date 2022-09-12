$(function () {
    $.fn.getProvinceInfo = function (url, elm, cityCode) {
        $_token = "{{ csrf_token() }}";
        $.ajax({
            headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
            url: `${url}`,
            type: "GET",
            data: { cityCode },
            success: function (result) {
                elm.html(result.html);
            },
            error: function (xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            },
        });
    };

    $.fn.getWardInfo = function (url2, elm, provinceCode) {
        $_token = "{{ csrf_token() }}";
        $.ajax({
            headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
            url: `${url2}`,
            type: "GET",
            data: { provinceCode },
            success: function (result) {
                elm.html(result.html);
            },
            error: function (xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            },
        });
    };

    $cityCode = $("#city").val();
    let url = `/admin/get-province-info/`;
    $.fn.getProvinceInfo(url, $("#province"), $cityCode);

    $("#city").on("change", function (e) {
        $cityCode = $("#city").val();
        e.preventDefault();
        let url = `/admin/get-province-info/`;
        $.fn.getProvinceInfo(url, $("#province"), $cityCode);
    });

    $provinceCode = $("#province").val();
    console.log($provinceCode);
    let url2 = `/admin/get-ward-info/`;
    $.fn.getWardInfo(url2, $("#ward"), $provinceCode);

    $("#province").on("change", function (e) {
        $provinceCode = $("#province").val();
        e.preventDefault();
        let url2 = `/admin/get-ward-info/`;
        $.fn.getWardInfo(url2, $("#ward"), $provinceCode);
    });
});
