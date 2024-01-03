<template>
    <Pie :data="data" :options="options" />
</template>

<script lang="ts">
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement
} from 'chart.js'
import { Pie } from 'vue-chartjs'

ChartJS.register(ArcElement, Title, Tooltip, Legend)

// defineProps({
//     chartConfig: Object,
// });

export default {
    name: 'PieChart',
    components: {
        Pie
    },
    data() {
        return {
            data: {
                labels: ['January', 'February', 'March', 'April'],
                datasets: [{
                    label: 'Data Two',
                    data: [40, 20, 12, 30]
                }],
                hoverOffset: 4
            },
            options: {
                responsive: true,
            }
        }

        // return chartConfig
    }
}
</script>
