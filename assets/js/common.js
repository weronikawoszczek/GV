app.common = {
    mainInit: () => {
        let text = 'ES6 is working';

        $('.costam').click(function () {
            $('.costam').slideDown();
        });
    }
}

$(function () {
    $(document).ready(() => {
        app.common.mainInit();
    })
});
