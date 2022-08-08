$(document).ready(function () {

    getStatisticDetails(3);

    $(document).on("click", "#parent option", function () {
        console.log($(this).data("name"));
        //$(this).val($(this).data("name"));
    });

    function getStatisticDetails(id) {

        loadingElement('#statistic_details', true);
        var request = $.ajax({
            url: "/admin/statistics/details/" + id,
            type: "post",
            data: {id: id},
            dataType: "json"
        });

        request.done(function (res) {
            loadingElement('#statistic_details', false);
            if (res.status === "true") {
                console.log(res.details);

                // Define charts elements
                var pie_chart_element = document.getElementById('c3-pie-chart');
                var donut_chart_element = document.getElementById('c3-donut-chart');
                var bar_chart_element = document.getElementById('c3-bar-chart');
                var bar_stacked_chart_element = document.getElementById('c3-bar-stacked-chart');
                var combined_chart_element = document.getElementById('c3-combined-chart');
                var scatter_chart_element = document.getElementById('c3-scatter-chart');
                var sidebarToggle = document.querySelector('.sidebar-control');

                // Pie chart
                if (pie_chart_element) {

                    // Generate chart
                    var pie_chart = c3.generate({
                        bindto: pie_chart_element,
                        size: {width: 350},
                        color: {
                            pattern: ['#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80']
                        },
                        data: {
                            columns: res.browserData,
                            type: 'pie'
                        }
                    });

                    // Change data
                    // setTimeout(function () {
                    //     pie_chart.load({
                    //         columns: res.col2
                    //     });
                    // }, 4000);
                    // setTimeout(function () {
                    //     pie_chart.unload({
                    //         ids: 'data1'
                    //     });
                    //     pie_chart.unload({
                    //         ids: 'data2'
                    //     });
                    // }, 8000);
                    //
                    // // Resize chart on sidebar width change
                    // sidebarToggle && sidebarToggle.addEventListener('click', function () {
                    //     pie_chart.resize();
                    // });
                }

                // Donut chart
                if (donut_chart_element) {

                    // Generate chart
                    var donut_chart = c3.generate({
                        bindto: donut_chart_element,
                        size: {width: 350},
                        color: {
                            pattern: ['#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80']
                        },
                        data: {
                            columns: res.deviceData,
                            type: 'donut'
                        },
                        donut: {
                            title: "Devices"
                        }
                    });

                    // Change data
                    // setTimeout(function () {
                    //     donut_chart.load({
                    //         columns: res.col2
                    //     });
                    // }, 4000);
                    // setTimeout(function () {
                    //     donut_chart.unload({
                    //         ids: 'data1'
                    //     });
                    //     donut_chart.unload({
                    //         ids: 'data2'
                    //     });
                    // }, 8000);
                    //
                    // // Resize chart on sidebar width change
                    // sidebarToggle && sidebarToggle.addEventListener('click', function () {
                    //     donut_chart.resize();
                    // });
                }

                // Bar chart
                if (bar_chart_element) {

                    // Generate chart
                    var bar_chart = c3.generate({
                        bindto: bar_chart_element,
                        size: {height: 400},
                        data: {
                            columns: res.monthlyVisits,
                            type: 'bar',
                            groups: res.monthlyGroups
                        },
                        color: {
                            pattern: ['#66bb6a', '#ffb980', '#2ec7c9']
                        },
                        bar: {
                            width: {
                                ratio: 0.5
                            }
                        },
                        grid: {
                            y: {
                                show: true
                            }
                        }
                    });

                    // Change data
                    // setTimeout(function () {
                    //     bar_chart.load({
                    //         columns: res.col6
                    //     });
                    // }, 6000);
                    //
                    // // Resize chart on sidebar width change
                    // sidebarToggle && sidebarToggle.addEventListener('click', function () {
                    //     bar_chart.resize();
                    // });
                }

                // Stacked bar chart
                if (bar_stacked_chart_element) {

                    // Generate chart
                    var bar_stacked_chart = c3.generate({
                        bindto: bar_stacked_chart_element,
                        size: {height: 400},
                        color: {
                            pattern: ['#66bb6a', '#42a5f5', '#d87a80', '#ffb980']
                        },
                        data: {
                            columns: res.categoryVisitData,
                            type: 'bar',
                            groups: [
                                ['data1', 'data2']
                            ]
                        },
                        grid: {
                            x: {
                                show: true
                            },
                            y: {
                                lines: [{value: 0}]
                            }
                        }
                    });

                    // Change data
                    // setTimeout(function () {
                    //     bar_stacked_chart.groups([['data1', 'data2', 'data3']])
                    // }, 4000);
                    // setTimeout(function () {
                    //     bar_stacked_chart.load({
                    //         columns: [['data4', 100, -50, 150, 200, -300, -100]]
                    //     });
                    // }, 8000);
                    // setTimeout(function () {
                    //     bar_stacked_chart.groups([['data1', 'data2', 'data3', 'data4']])
                    // }, 10000);
                    //
                    // // Resize chart on sidebar width change
                    // sidebarToggle && sidebarToggle.addEventListener('click', function () {
                    //     bar_stacked_chart.resize();
                    // });
                }

                // Combined chart
                if (combined_chart_element) {

                    // Generate chart
                    var combined_chart = c3.generate({
                        bindto: combined_chart_element,
                        size: {height: 400},
                        color: {
                            pattern: ['#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80', '#8d98b3']
                        },
                        data: {
                            columns: res.postTypesVisit,
                            type: 'bar',
                            types: {
                                projects: 'spline',
                                portfolios: 'line',
                                certificates: 'area',
                            },
                            groups: [
                                ['post', 'services']
                            ]
                        }
                    });

                    // Resize chart on sidebar width change
                    sidebarToggle && sidebarToggle.addEventListener('click', function () {
                        combined_chart.resize();
                    });
                }

                // Scatter chart
                // if (scatter_chart_element) {
                //
                //     // Generate chart
                //     var scatter_chart = c3.generate({
                //         size: {height: 400},
                //         bindto: scatter_chart_element,
                //         data: {
                //             xs: {
                //                 setosa: 'setosa_x',
                //                 versicolor: 'versicolor_x',
                //                 posts: 'posts_x',
                //             },
                //             columns: res.scatterPlotData,
                //             type: 'scatter'
                //         },
                //         color: {
                //             pattern: ['#4CAF50', '#ef534f']
                //         },
                //         grid: {
                //             y: {
                //                 show: true
                //             }
                //         },
                //         point: {r: 5},
                //         axis: {
                //             x: {
                //                 label: 'Sepal.Width',
                //                 tick: {
                //                     fit: false
                //                 }
                //             },
                //             y: {
                //                 label: 'Petal.Width'
                //             }
                //         }
                //     });
                //
                //     // Change data
                //     // setTimeout(function () {
                //     //     scatter_chart.load({
                //     //         xs: {
                //     //             virginica: 'virginica_x'
                //     //         },
                //     //         columns: res.col8
                //     //     });
                //     // }, 4000);
                //     // setTimeout(function () {
                //     //     scatter_chart.unload({
                //     //         ids: 'setosa'
                //     //     });
                //     // }, 8000);
                //     // setTimeout(function () {
                //     //     scatter_chart.load({
                //     //         columns: res.col9
                //     //     });
                //     // }, 10000);
                //
                //     // Resize chart on sidebar width change
                //     sidebarToggle && sidebarToggle.addEventListener('click', function () {
                //         scatter_chart.resize();
                //     });
                // }


            } else {
                messageAlert('toast', 'title', res.msg, 'error');
            }
        });

        request.fail(function (jqXHR, textStatus) {
            loadingElement('#statistic_details', false);
            messageAlert('toast', 'title', requestUnsuccessful, 'error');

        });
    }

});


