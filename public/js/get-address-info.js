// $(function () {
//     $.fn.getDistrictInfo = function (url, elm, provinceCode) {
//         $_token = "{{ csrf_token() }}";
//         $.ajax({
//             headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
//             url: `${url}`,
//             type: "GET",
//             data: { provinceCode },
//             success: function (result) {
//                 elm.html(result.html);
//             },
//             error: function (xhr, textStatus, thrownError) {
//                 alert(xhr + "\n" + textStatus + "\n" + thrownError);
//             },
//         });
//     };

//     $.fn.getWardInfo = function (url2, elm, districtCode) {
//         $_token = "{{ csrf_token() }}";
//         $.ajax({
//             headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
//             url: `${url2}`,
//             type: "GET",
//             data: { districtCode },
//             success: function (result) {
//                 elm.html(result.html);
//             },
//             error: function (xhr, textStatus, thrownError) {
//                 alert(xhr + "\n" + textStatus + "\n" + thrownError);
//             },
//         });
//     };

//     $provinceCode = $("#province").val();
//     console.log($provinceCode);
//     let url = `/admin/get-district-info/`;
//     $.fn.getDistrictInfo(url, $("#district"), $provinceCode);

//     $("#province").on("change", function (e) {
//         $provinceCode = $("#province").val();
//         e.preventDefault();
//         let url = `/admin/get-district-info/`;
//         $.fn.getDistrictInfo(url, $("#district"), $provinceCode);
//     });

//     $districtCode = $("#district").val();
//     console.log($districtCode);
//     let url2 = `/admin/get-ward-info/`;
//     $.fn.getWardInfo(url2, $("#ward"), $districtCode);

//     $("#district").on("change", function (e) {
//         $districtCode = $("#district").val();
//         e.preventDefault();
//         let url2 = `/admin/get-ward-info/`;
//         $.fn.getWardInfo(url2, $("#ward"), $districtCode);
//     });
// });

var citis = document.getElementById("province");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
    url: "../js/data.json", //Đường dẫn đến file chứa dữ liệu hoặc api do backend cung cấp
    method: "GET", //do backend cung cấp
    responseType: "application/json", //kiểu Dữ liệu trả về do backend cung cấp
};
//gọi ajax = axios => nó trả về cho chúng ta là một promise
var promise = axios(Parameter);
//Xử lý khi request thành công
promise.then(function (result) {
    renderCity(result.data);
});

function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    // xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
    citis.onchange = function () {
        district.length = 1;
        ward.length = 1;
        if (this.value != "") {
            const result = data.filter((n) => n.Id === this.value);
            for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(
                    k.Name,
                    k.Id
                );
            }
        }
    };

    // xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
    district.onchange = function () {
        ward.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(
                (n) => n.Id === this.value
            )[0].Wards;

            for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }
        }
    };
}
