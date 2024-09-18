<template>
  <div class="my-component">
    <h3>{{ title }}</h3>
    <input v-model="inputValue" placeholder="Type something..." />
    <p>You typed: {{ inputValue }}</p>
  </div>
</template>

<script>
export default {
  name: 'MyComponent',
  props: {
    title: {
      type: String,
      default: 'My Vue Component',
    },
  },
  data() {
    return {
      inputValue: '',
    };
  },
};
</script>

<style scoped>
.my-component {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 10px 0;
}
</style>