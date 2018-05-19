var LODOP;
var st = {};
st.initPrinter=function(taskname) {
    LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
    LODOP.PRINT_INIT(taskname);
    LODOP.ADD_PRINT_SETUP_BKIMG("<img border='0' src='/public/images/printer/shentong1.jpg'>");
};

st.setdata=function(data) {
    LODOP.SET_SHOW_MODE("BKIMG_WIDTH","215.11mm");
    LODOP.SET_SHOW_MODE("BKIMG_HEIGHT","120.12mm");
    LODOP.ADD_PRINT_TEXT(105,139,134,20,data.shop_contact_name);
    LODOP.ADD_PRINT_TEXT(169,128,100,20,data.shop_address);
    LODOP.ADD_PRINT_TEXT(230,165,100,20,data.shop_mobile);
    LODOP.ADD_PRINT_TEXT(259,163,100,20,data.product_title);
    LODOP.ADD_PRINT_TEXT(106,467,100,20,data.recv_uname);
    LODOP.ADD_PRINT_TEXT(171,448,100,20,data.recv_address);
    LODOP.ADD_PRINT_TEXT(228,490,100,20,data.recv_mobile);
};
st.pretpl = function () {
    var data ={
        'shop_contact_name':'店铺联系人',
        'shop_address':'店铺地址',
        'shop_mobile':'店铺手机号',
        'product_title':'商品标题',
        'recv_uname':'收件人姓名',
        'recv_address':'收件人地址',
        'recv_mobile':'收件人手机号',
    };
    st.setdata(data);
    LODOP.PREVIEW();
};
//预览
st.preview = function (data) {

    st.setdata(data);
    LODOP.PREVIEW();
};
//打印维护
st.setup=function (data) {

    st.setdata(data);
    LODOP.PRINT_SETUP();
};
st.print=function (data) {
    st.setdata(data);
    LODOP.SET_PRINT_PAGESIZE(1, '230mm', '127mm', "");
    LODOP.PRINT();
};
//打印
// st.batchprint=function (data) {
//     console.log('st batch print....');
//
//     for(var i=0;i<data.length;i++){
//         console.log(data[i]);
//         st.setdata(data[i]);
//         LODOP.SET_PRINT_PAGESIZE(1, '230mm', '127mm', "");//宽，高,第二个参数是纸张高度，请实际测量
//         if (LODOP.PRINT()){
//             updateAlert('打印指令已发送!')
//         }else{
//             updateAlert('放弃打印！');
//         }
//     }
//
// };

window.ZY_PRINTER={
    'st':st
};