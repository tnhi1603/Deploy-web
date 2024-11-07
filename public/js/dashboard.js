

var csrfToken = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
    $("#monthSelect").on('change', (event) => {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
      })  
      let startDate = '20' + event.target.value + "/1";
      let endDate = '20' + event.target.value + "/30";
      let sum = 0;
      $.ajax({
        method: 'get',
        url: `/order/get?start_date=${startDate}&end_date=${endDate}`,
        success: function (orderdata, textStatus) {
          const monthRevenue = document.createElement('span');
          monthRevenue.setAttribute("class", "RevenueResults");
          for (var i = 0; i < orderdata.orders.length; i++) {
            var item = orderdata.orders[i];
            if (item.status = "Success") {
              sum = sum + item.total_prices;
            }
          }
          monthRevenue.textContent = sum;
          $('div#monthRevenue').find('p').text('');
          document.querySelector('.rev-result').innerHTML = '';
          document.querySelector('.rev-result').appendChild(monthRevenue);
          // console.log(orderdata[0].order)
          $('div#totalOrder').find('p').text('');
          document.querySelector('.order-result').innerHTML = orderdata.orders.length;
        }
      });
    })
})
// const monthSelection = document.getElementById()
// var data = {
//     "products" : [20,17,20,5,40],
//     "orders": [15 ,13, 19, 1 ,30],
//     "prices": [7114.25, 7126.6, 3330.2 , 434.333, 493.93],
//     "dates": ["02 Jun 2023", "05 Jun 2023","05 July 2023","15 May 2023" ,"25 May 2023" /* ... */]
// };

// // Create an object to store monthly averages
// var monthlyAverages = {};

// // Loop through the data
// for (var i = 0; i < data.dates.length; i++) {
//     var dateParts = data.dates[i].split(" ");
//     // datePart 0 : date
//     // dataPart 1 : month
//     // dataPart 2 : year
//     var monthOfYear = dateParts[1] + " " + dateParts[2];
//     var price = data.prices[i];
//     var orders = data.orders[i];
//     var products = data.products[i]

//     // if monthOfYear in monthyAverage object is not exists, set : 0 
//     if (!monthlyAverages[monthOfYear]) {
//         monthlyAverages[monthOfYear] = {
//             sum: 0,
//             count: 0,
//             orderCount : 0,
//             productCount:0,
//         };
//     }
//     // else, total  index value of (dates[] = monthOfYear) in monthlyAverages
//     monthlyAverages[monthOfYear].sum += price;
//     //  total index of monthOfYear in monthAverages
//     monthlyAverages[monthOfYear].count++;
//     monthlyAverages[monthOfYear].orderCount += orders;
//     monthlyAverages[monthOfYear].productCount += products;
// }
// var chartData = Object.keys(monthlyAverages).map(function(key) {
//     return { 
//         monthYear: key, 
//         total: monthlyAverages[key].sum,
//         orderCount: monthlyAverages[key].orderCount,
//         productCount : monthlyAverages[key].productCount
//     };

// });

// //  display revenue result
// monthSelected.addEventListener("change", function(event) {
//     // Get the selected value
//     const selectedProduct = event.target.options[event.target.selectedIndex].getAttribute("data-product");
//     const selectedOrder = event.target.options[event.target.selectedIndex].getAttribute("data-order");
//     const selectedValue = event.target.options[event.target.selectedIndex].value;
//     const selectedName= event.target.options[event.target.selectedIndex].name;

//     // Check if a monthRevenue element already exists and update its value, or create a new one
//     let monthRevenue = document.querySelector('.RevenueResults');
//     let orderCounts = document.querySelector('.OrderResults');
//     let productCount = document.querySelector('.ProductResults');
//     let monthRevenue = document.querySelector('.RevenueResults');
//         monthRevenue = document.createElement('span');
//         monthRevenue.setAttribute("class", "RevenueResults");
//         document.querySelector('.rev-result').appendChild(monthRevenue);
// document.querySelectorAll('.no-data').forEach(element => {
  //           element.style.display = 'none';
  //       });
//     if (!monthRevenue && !orderCounts && !productCount) {
//         monthRevenue = document.createElement('span');
//         orderCounts = document.createElement('p');
//         productCount = document.createElement('p');

//         monthRevenue.setAttribute("class", "RevenueResults");
//         orderCounts.setAttribute("class", "OrderResults");
//         productCount.setAttribute('class', "ProductResults");

//         document.querySelector('.rev-result').appendChild(monthRevenue);
//         document.querySelector('.order-result').appendChild(orderCounts);
//         document.querySelector('.product-result').appendChild(productCount);

//         document.querySelectorAll('.no-data').forEach(element => {
//           element.style.display = 'none';
//       });
//     }
//         monthRevenue.innerHTML = selectedValue;
//         orderCounts.innerHTML =   selectedOrder;
//         productCount.innerHTML =  selectedProduct; 
// });

// // bar chart
// const barContainer = document.querySelector('#bar-chart');

// const barChartOptions = {
//     series: [
//       {
//         data: chartData.map(function(item) {
//             return item.orderCount;
//         }),
//       },
//     ],
//     chart: {
//       type: 'bar',
//       height: 350,
//       toolbar: {
//         show: false,
//       },
//     },
//     colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
//     plotOptions: {
//       bar: {
//         distributed: true,
//         borderRadius: 4,
//         horizontal: false,
//         columnWidth: '40%',
//       },
//     },
//     dataLabels: {
//       enabled: true,
//     },
//     legend: {
//       show: false,
//     },
//     xaxis: {
//         categories: chartData.map(function(item) {
//           return item.monthYear;
//       }),
//       title: {
//         text: 'Month',
//       },
//     },
//     yaxis: {
//       title: {
//         text: 'Order Count',
//       },
//     },
//   };
// var chartElement = new ApexCharts(barContainer, barChartOptions)
// chartElement.render();

// // AREA CHART
// const areaContainer = document.querySelector('#area-chart');

// const areaChartOptions = {
//     series: [
//       {
//         name: 'Product Total ',
//         data: chartData.map(function(item) {
//            return item.productCount;
//         }),
//       },
//       {
//         name: 'Sales Orders',
//         data: chartData.map(function(item) {
//           return item.orderCount;
//         }),
//       },
//     ],
//     chart: {
//       height: 350,
//       type: 'area',
//       toolbar: {
//         show: false,
//       },
//     },
//     colors: ['#4f35a1', '#246dec'],
//     dataLabels: {
//       enabled: false,
//     },
//     stroke: {
//       curve: 'smooth',
//     },
//     labels: chartData.map(function(item) {
//         return item.monthYear;
//     }),
//     markers: {
//       size: 0,
//     },
//     yaxis: [
//       {
//         title: {
//           text: 'Product Total',
//         },
//       },
//       {
//         opposite: true,
//         title: {
//           text: 'Sales Orders',
//         },
//       },
//     ],
//     tooltip: {
//       shared: true,
//       intersect: false,
//     },
//   };
  
//   const areaChart = new ApexCharts(
//     areaContainer,
//     areaChartOptions
//   );
//   areaChart.render();