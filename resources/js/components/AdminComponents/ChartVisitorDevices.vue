<script>
import { Doughnut, mixins } from "vue-chartjs";
const { reactiveProp } = mixins;

export default {
    name:"chart-visitor-devices",
    mixins: [reactiveProp],
    extends: Doughnut,
    props: {
        options: { type: Object }
    },
    mounted() {
        this.renderChart(this.chartData, this.options);
    },
    watch: {
        options: {
            deep: true,
            handler() {
                this.$data._chart.options = this.options;
                this.updateChart();
            }
        }
    }
}
</script>