<template>
  <div class="form-group">
    <div class="row form-group">
      <div class="col">Memory Attributes</div>
      <div class="col" v-if="page !== 'show'">
        <input type="button" class="btn btn-primary" @click="addRow" value="Add Row" />
      </div>
    </div>
    <table class="table table-hover table-bordered" v-if="savedAttributes">
      <thead>
        <th>Name</th>
        <th>Value</th>
      </thead>
      <tbody>
        <tr v-for="(attr, i) in attributesJson" :key="attr.name">
          <td>{{ attr.name }}</td>
          <td>{{ attr.value }}</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-hover table-bordered" v-else>
      <thead>
        <th>Name</th>
        <th>Value</th>
      </thead>
      <tbody>
        <tr v-for="(property, i) in properties" :key="property.id">
          <td>
            <input
              type="text"
              class="form-control"
              :name="`attributes[${i}][name]`"
              :disabled="page !== 'create'"
              v-model="property.name"
            />
          </td>
          <td>
            <input
              type="text"
              v-model="property.value"
              class="form-control"
              :name="`attributes[${i}][value]}`"
              :disabled="page !== 'create'"
            />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["page", "savedAttributes"],
  data: function() {
    return {
      properties: [
        {
          id: 1,
          name: "",
          value: ""
        }
      ],
      currentId: 1
    };
  },
  computed: {
    attributesJson() {
      return JSON.parse(this.savedAttributes);
    }
  },
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
