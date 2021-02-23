<script>
import { Line, mixins } from "vue-chartjs";
const { reactiveProp } = mixins;

export default {
    name: "chart-visitors",
    mixins: [reactiveProp],
    extends: Line,
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
};
</script>
