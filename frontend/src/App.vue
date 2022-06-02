<template>
  <div v-if="data">
    <Header />
    <div class="chart-wrapper">
      <GoogleChart :chartDataStructure="chartDataStructure" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Header from "./components/Header";
import GoogleChart from "./components/GoogleChart"
export default {
  components: { Header, GoogleChart },
  data() {
    return {
      data: null,
    };
  },
  async mounted() {
    const response = await axios.get("http://127.0.0.1:8000/api");
    const data = response.data;
    this.data = data;
  },
  computed: {
    sectors() {
      const sectors = [... new Set(this.data.map(obj => obj.name))]
      return sectors;
    },

    interactionsCount() {
      const arr = [];
      for (let i = 0; i < this.sectors.length; i++) {
        arr.push(this.data.filter((e) => e.name === this.sectors[i]).length);
      }
      return arr;
    },

    chartDataStructure() {
      const arr = [['Sector', 'Number of interactions']];
      for (let i = 0; i < this.sectors.length; i++) {
        arr.push([this.sectors[i], this.interactionsCount[i]]);
      }
      return arr;
    }
  }
};
</script>

<style>
* {
  background-color: lightgray;
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

</style>
