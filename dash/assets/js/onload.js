/**
 * Created by ahmedbug on 6/9/17.
 */
//Load Dashboard
$(document).ready(function () {
    $('.dash').click(function () {
        $('#change').text('Dashboard');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('dash/dash.php');
    });
});

//Entries Load
$(document).ready(function () {
    $('.installmentEntries').click(function () {
        $('#change').text('Installment Entries');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('entries/installmentEntries.php');
    });
});
$(document).ready(function () {
    $('.balanceSEntries').click(function () {
        $('#change').text('Balance Sheet Entries');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('entries/balanceSheetEntries.php');
    });
});

//Tables Load
$(document).ready(function () {
    $('.balanceSheet').click(function () {
        $('#change').text('Balance Sheet');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('tables/balanceSheet_Editable.php');
    });
});
$(document).ready(function () {
    $('.dataSheet').click(function () {
        $('#change').text('Data Sheet');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('tables/dataSheet_Editable.php');
    });
});

//Pages Load
$(document).ready(function () {
    $('.userProfile').click(function () {
        $('#change').text('User Profile');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('pages/userProfile.php');
    });
});
$(document).ready(function () {
    $('.settings').click(function () {
        $('#change').text('Settings');
        $('#change').prop('href', '#');
        $('.content').empty();
        $('.content').load('pages/settings.php');
    });
});

//logout
$(document).ready(function () {
    $('.logout').click(function () {
        demo.showSwal('warning-message-and-cancel');
    });
});

