var mode = "index";
var intersect = true;
var ticksStyle = {
  fontColor: "#495057",
  fontStyle: "bold",
};

function onAlreadyLoaded(fn) {
  // see if DOM is already available
  if (
    document.readyState === "complete" ||
    document.readyState === "interactive"
  ) {
    // call on next available tick
    setTimeout(fn, 1);
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
}

onAlreadyLoaded(function () {
  drawOmsetChart();
  drawProfitChart();
});

async function drawOmsetChart() {
  const dataset = await generateDataOmset(globalBaseUrl + "admin/api_omset");

  var ctx = document.getElementById("omsetChart").getContext("2d");
  var omsetChart = new Chart(ctx, {
    data: {
      labels: dataset.verticalLabel,
      datasets: [
        {
          type: "line",
          data: dataset.horizontalLabel,
          backgroundColor: "transparent",
          borderColor: "#007bff",
          pointBorderColor: "#007bff",
          pointBackgroundColor: "#007bff",
          fill: false,
          // pointHoverBackgroundColor: "#007bff",
          // pointHoverBorderColor: "#007bff",
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect,
        callbacks: {
          label: function (tooltipItem) {
            return formatCurrency(tooltipItem.value);
          },
        },
      },
      hover: {
        mode: mode,
        intersect: intersect,
      },
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            // display: false,
            gridLines: {
              display: true,
              lineWidth: "4px",
              color: "rgba(0, 0, 0, .2)",
              zeroLineColor: "transparent",
            },
            ticks: $.extend(
              {
                beginAtZero: true,
                callback: function (value) {
                  return formatCurrency(value);
                },
                // suggestedMax: 200,
              },
              ticksStyle
            ),
          },
        ],
        xAxes: [
          {
            display: true,
            gridLines: {
              display: false,
            },
            ticks: {
              ticksStyle,
            },
          },
        ],
      },
    },
  });
}

async function drawProfitChart() {
  const dataset = await generateDataProfit(globalBaseUrl + "admin/api_profit");

  var ctx2 = document.getElementById("profitChart").getContext("2d");
  var profitChart = new Chart(ctx2, {
    type: "bar",
    data: {
      labels: dataset.verticalLabel,
      datasets: [
        {
          backgroundColor: "#007bff",
          borderColor: "#007bff",
          data: dataset.horizontalLabel,
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect,
        callbacks: {
          label: function (tooltipItem) {
            return formatCurrency(tooltipItem.value) + " - " + dataset.extra;
          },
        },
      },
      hover: {
        mode: mode,
        intersect: intersect,
      },
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            // display: false,
            gridLines: {
              display: true,
              lineWidth: "4px",
              color: "rgba(0, 0, 0, .2)",
              zeroLineColor: "transparent",
            },
            ticks: $.extend(
              {
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value) {
                  return formatCurrency(value);
                },
              },
              ticksStyle
            ),
          },
        ],
        xAxes: [
          {
            barThickness: 50,
            display: true,
            gridLines: {
              display: false,
            },
            ticks: ticksStyle,
          },
        ],
      },
    },
  });
}

async function generateDataProfit(url) {
  const verticalLabel = [];
  const horizontalLabel = [];
  const extra = [];

  let response = await fetch(url);
  let result = await response.json();

  for (let index in result.data) {
    horizontalLabel.push(result.data[index].profit);
    verticalLabel.push(result.data[index].transaction_date);
    extra.push(result.data[index].long_date);
  }

  return { verticalLabel, horizontalLabel, extra };
}

async function generateDataOmset(url) {
  const verticalLabel = [];
  const horizontalLabel = [];

  let response = await fetch(url);
  let result = await response.json();

  for (let index in result.data) {
    verticalLabel.push(result.data[index].transaction_date);
    horizontalLabel.push(result.data[index].omset);
  }

  return { verticalLabel, horizontalLabel };
}

function formatCurrency(total) {
  var neg = false;
  if (total < 0) {
    neg = true;
    total = Math.abs(total);
  }
  return (
    (neg ? "-Rp. " : "Rp. ") +
    parseFloat(total, 10)
      .toFixed(2)
      .replace(/(\d)(?=(\d{3})+\.)/g, "$1,")
      .toString()
  );
}
