<template>
  <Layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a
          href="#"
          class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
          ><i class="fas fa-download fa-sm text-white-50"></i> Generate
          Report</a
        > -->
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-danger text-uppercase mb-1"
                  >
                    Total Visitors
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{datawidget.totalVisitor | number}}
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
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
                    {{datawidget.mostDevices}}
                  </div>
                </div>
                <div class="col-auto">
                  <i v-if="datawidget.typeDevices.toLowerCase() == 'mobile'" class="fas fa-mobile fa-2x text-gray-300"></i>
                  <i v-else class="fas fa-desktop fa-2x text-gray-300"></i>
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
                    Page Hit This Month (googlemaps)
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{datawidget.mapHitMonth}}</div>
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
                    Page Hit Today (googlemaps)
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{datawidget.mapHitToday}}</div>
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
                Chart Visitors <span class="font-weight-light text-muted">({{chartVisitor}})</span>
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
                  <div class="dropdown-header">Chart By:</div>
                  <button class="dropdown-item" @click="fillData('This Week')"  :class="chartVisitor == 'This Week' && 'active'">This Week</button>
                  <button class="dropdown-item" @click="fillData('This Month')"  :class="chartVisitor == 'This Month' && 'active'">This Month</button>
                  <button class="dropdown-item" @click="fillData('Last One Year')"  :class="chartVisitor == 'Last One Year' && 'active'">Last One Year</button>
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
              <h6 class="m-0 font-weight-bold text-primary">Chart Devices <span class="font-weight-light text-muted">({{chartVisitorsDevice}})</span></h6>
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
                  <div class="dropdown-header">Chart By:</div>
                  <button class="dropdown-item" @click="fillDataDevice('This Month')"  :class="chartVisitorsDevice == 'This Month' && 'active'">This Month</button>
                  <button class="dropdown-item" @click="fillDataDevice('Last One Year')"  :class="chartVisitorsDevice == 'Last One Year' && 'active'">Last One Year</button>
                  <button class="dropdown-item" @click="fillDataDevice('All')"  :class="chartVisitorsDevice == 'All' && 'active'">All</button>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="pt-4 pb-2">
                <chart-visitor-devices :chartData="datacollectiondevice" :options="chartDevicesOption"/>
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
  props: ["meta","chartweek","chartmonth","chartyear", "chartdevice", "chartdevicemonth", "chartdevicelastoneyear", "widget"],
  data() {
    return {
      chartVisitor:"This Week",
      chartVisitorsDevice:"This Month",
      backgroundColor: ['#36b9cc','#e74a3b','#6610f2','#5a5c69','#2e4053','#7fb3d5','#45b39d','#641e16','#2c3e50','#145a32'],
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
      chartDevicesOption: {responsive: true, maintainAspectRatio: false},
      datacollection: {},
      datacollectiondevice: {},
      datachartweek:{...this.chartweek},
      datachartmonth:{...this.chartmonth},
      datachartyear:{...this.chartyear},
      datachartdevice:{...this.chartdevice},
      datachartdevicemonth:{...this.chartdevicemonth},
      datachartdevicelastoneyear:{...this.chartdevicelastoneyear},
      datawidget:{...this.widget}
    };
  },
  mounted () {
		this.fillData(this.chartVisitor)
    this.fillDataDevice(this.chartVisitorsDevice)
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
        if(chartVisitor == 'Last One Year')
          this.datacollection = {
            labels: this.datachartyear.labels,
            datasets: [
              {
                label: this.datachartyear.label,
                backgroundColor: '#2874a6',
                borderColor:'#36b9cc',
                data: this.datachartyear.data,
                cubicInterpolationMode:'monotone',
                fill:false
              }
            ]
          }
          // cache index chart
        this.$ls.set("chartVisitor", chartVisitor)
        this.chartVisitor = chartVisitor
      },
    fillDataDevice(chartVisitorsDevice){
      if(chartVisitorsDevice == 'This Month')
          this.datacollectiondevice = {
            labels: this.datachartdevicemonth.labels,
            datasets: [
              {
                backgroundColor: this.backgroundColor,
                data: this.datachartdevicemonth.data,
              }
            ]
          }
        if(chartVisitorsDevice == 'Last One Year')
          this.datacollectiondevice = {
            labels: this.datachartdevicelastoneyear.labels,
            datasets: [
              {
                backgroundColor: this.backgroundColor,
                data: this.datachartdevicelastoneyear.data,
              }
            ]
          }
        if(chartVisitorsDevice == 'All')
          this.datacollectiondevice = {
            labels: this.datachartdevice.labels,
            datasets: [
              {
                backgroundColor: this.backgroundColor,
                data: this.datachartdevice.data,
              }
            ]
          }
        // cache index chart
        this.$ls.set("chartVisitorsDevice", chartVisitorsDevice)
        this.chartVisitorsDevice = chartVisitorsDevice
    }
	},
  beforeMount() {
        if (this.$ls.get("chartVisitorsDevice")) {
            this.chartVisitorsDevice = this.$ls.get("chartVisitorsDevice");
        }
        if (this.$ls.get("chartVisitor")) {
            this.chartVisitor = this.$ls.get("chartVisitor");
        }
    }
}
</script>
