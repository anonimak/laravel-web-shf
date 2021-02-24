<script>
import {Doughnut} from 'vue-chartjs' 
export default {
    name:"chart-visitor-devices",
    extends: Doughnut,
    mounted () {
        this.renderChart({
        labels:['windows','Android','IOS'],
        datasets: [
            {
            backgroundColor: ['#36b9cc','#e74a3b','#6610f2','#5a5c69','#2e4053','#7fb3d5','#45b39d','#641e16','#2c3e50','#145a32'],
            data: [40,2,0]
            }
        ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>