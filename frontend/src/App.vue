<template>
  <div v-if="data">
    {{ data }}
  </div>
</template>

<script>
import axios from "axios";
export default {
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
};
</script>

<style scoped></style>
