<template>
  <div class="form-group">
    <label for="file" class="label-control">Upload a file</label>
    <div class="d-flex">
      <div class="col">
        <input
          type="file"
          accept="image/*"
          id="file"
          class="form-control border-0"
          name="image"
          @change="getSrc"
        />
      </div>
      <div v-if="imgSrc" class="col">
        <img :src="imgSrc" class="img-fluid" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      src: null
    };
  },
  computed: {
    imgSrc() {
      return this.src;
    }
  },
  methods: {
    getSrc(e) {
      const file = e.target.files[0];
      this.src = URL.createObjectURL(file);
    }
  }
};
</script>

<style scoped>
</style>