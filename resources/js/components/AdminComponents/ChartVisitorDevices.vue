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
            backgroundColor: ['#2874a6','#cb4335','#e67e22','#a569bd','#2e4053','#7fb3d5','#45b39d','#641e16','#2c3e50','#145a32'],
            data: [40,2,0]
            }
        ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>