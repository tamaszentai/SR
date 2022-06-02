<template>
  <GChart :type="type" :data="data" :options="options" />
</template>

<script>
import { GChart } from 'vue-google-charts/legacy';


export default {
  props: ["chartDataStructure"],
  name: 'GoogleChart',
  components: {
    GChart,
  },
  data() {
    return {
      type: 'PieChart',
      data: this.chartDataStructure,
      options: {
        title: 'Percentage of interactions / sector',
        width: 1200,
        height: 1000,
        backgroundColor: {
        fill:'lightgrey'     
        },
      }
    };
  },
};
</script>