<template>
    <Bar :data="data" :options="options" />
</template>

<script lang="ts" >
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs'

// defineProps({
//     chartConfig: Object,
//     transactions: Object,
// });

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

export default {
    name: 'BarChart',
    props: ['transactions'],
    components: {
        Bar
    },
    data() {
        return {
            data: {
                labels: ['January', 'February', 'March', 'April'],
                datasets: [{
                    label: 'Data One',
                    data: [40, 20, 12, 30] }
                ]
            },
            options: {
                responsive: true
            }
        }
        // return chartConfig
    }
}
</script>
