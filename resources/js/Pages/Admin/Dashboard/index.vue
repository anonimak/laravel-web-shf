<template>
  <Layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a
          href="#"
          class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
          ><i class="fas fa-download fa-sm text-white-50"></i> Generate
          Report</a
        >
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                  >
                    Earnings (Monthly)
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    $40,000
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                  >
                    Most Devices Access
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    Android 75%
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-mobile fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-info text-uppercase mb-1"
                  >
                    Page Hit This Month (map)
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">216</div>
                  visitors
                </div>
                <div class="col-auto">
                  <i class="fas fa-map fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                  >
                    Page Hit Today (map)
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                  visitors
                </div>
                <div class="col-auto">
                  <i class="fas fa-map fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
              <h6 class="m-0 font-weight-bold text-primary">
                Chart Visitors
              </h6>
              <div class="dropdown no-arrow">
                <a
                  class="dropdown-toggle"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink"
                >
                  <div class="dropdown-header">Sort By:</div>
                  <button class="dropdown-item" @click="fillData('This Week')"  :class="chartVisitor == 'This Week' && 'active'">This Week</button>
                  <button class="dropdown-item" @click="fillData('This Month')"  :class="chartVisitor == 'This Month' && 'active'">This Month</button>
                  <button class="dropdown-item" @click="fillData('This Year')"  :class="chartVisitor == 'This Year' && 'active'">This Year</button>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="pt-4 pb-2">
                <chart-visitors :chartData="datacollection" :options="chartOptions"/>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
              <h6 class="m-0 font-weight-bold text-primary">Devices</h6>
              <div class="dropdown no-arrow">
                <a
                  class="dropdown-toggle"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink"
                >
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="pt-4 pb-2">
                <chart-visitor-devices/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </Layout>
</template>

<script>
import Layout from "@/Shared/AdminLayout"; //import layouts
import ChartVisitors from '@/components/AdminComponents/ChartVisitors.vue';
import ChartVisitorDevices from '@/components/AdminComponents/ChartVisitorDevices.vue';

export default {
  metaInfo: { title: "Beranda" },
  components: {
    Layout,
    ChartVisitors,
    ChartVisitorDevices
  },
  props: ["meta","chartweek","chartmonth"],
  data() {
    return {
      chartVisitor:"This Week",
      chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true,
                          userCallback: function(label, index, labels) {
                              // when the floored value is the same as the value we have a whole number
                              if (Math.floor(label) === label) {
                                  return label;
                              }

                          },
                      }
                  }],
                },
      },
      datacollection: {},
      datachartweek:{...this.chartweek},
      datachartmonth:{...this.chartmonth}
    };
  },
  mounted () {
		this.fillData(this.chartVisitor)
	},
  methods: {
		fillData (chartVisitor) {
        if(chartVisitor == 'This Week')
          this.datacollection = {
            labels: this.datachartweek.labels,
            datasets: [
              {
                label: this.datachartweek.label,
                backgroundColor: '#2874a6',
                borderColor:'#36b9cc',
                data: this.datachartweek.data,
                cubicInterpolationMode:'monotone',
                fill:false
              }
            ]
          }
        if(chartVisitor == 'This Month')
          this.datacollection = {
            labels: this.datachartmonth.labels,
            datasets: [
              {
                label: this.datachartmonth.label,
                backgroundColor: '#2874a6',
                borderColor:'#36b9cc',
                data: this.datachartmonth.data,
                cubicInterpolationMode:'monotone',
                fill:false
              }
            ]
          }
        
        this.chartVisitor = chartVisitor
      },
    getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
	}
}
</script>
