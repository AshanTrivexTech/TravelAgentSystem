// this.onmessage = e => {
//     const delay = e.data;

//     const start = performance.now();
//     while (performance.now() - start < delay);
//     const end = performance.now();

//     this.postMessage(end - start);
// };

// // $.ajaxSetup({
// //     headers: {
// //                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// //              }
// //     });

//        $.getJSON({
//             url:'/dashboard/load/data',
//             method:'POST',
//             data:{id:1},
//              //dataType:'json',
//             success:function (data) {

//             //  console.log(data);
//            $('#tot_quotes_new').html(data);
//            }
//    })


// // for(var i = 0; i<=100000;i++){
// //     this.postMessage(i);
// //    //
// // }
