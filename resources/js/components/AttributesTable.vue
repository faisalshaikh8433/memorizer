<template>
  <div class="form-group">
    <div class="row form-group">
      <div class="col">Memory Attributes</div>
      <div class="col">
        <input type="button" class="btn btn-primary" @click="addRow" value="Add Row" />
      </div>
    </div>
    <table class="table table-hover table-bordered">
      <thead>
        <th>Name</th>
        <th>Value</th>
      </thead>
      <tbody>
        <tr v-for="(property, i) in properties" :key="property.id">
          <td>
            <input
              type="text"
              :value="property.name"
              class="form-control"
              :name="`attributes[${i}]['name']`"
            />
          </td>
          <td>
            <input
              type="text"
              :value="property.value"
              class="form-control"
              :name="`attributes[${i}]['value']}`"
            />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      properties: [
        {
          id: 1,
          name: "width",
          value: "5"
        }
      ],
      currentId: 1
    };
  },
  computed: {},
  methods: {
    addRow() {
      let id = this.currentId + 1;
      this.properties.push({
        id,
        name: "",
        value: ""
      });
      this.currentId = id;
    }
  }
};
</script>

<style scoped>
</style>