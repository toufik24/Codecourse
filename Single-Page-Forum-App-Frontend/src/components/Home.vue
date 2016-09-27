<template>
  <ul class="list-unstyled">
    <li class="well" v-for="section in sections">
      <h4><a v-link="{ name: 'section', params: { sectionId: section.id } }">{{ section.title }}</a></h4>
      <p>{{ section.description }}</p>
    </li>
  </ul>
</template>

<script>
  import store from '../store'

  export default {
    data () {
      return {
        sections: []
      }
    },
    route: {
      data () {
        return store.getSections().then(sections => {
          this.sections = sections
        })
      }
    }
  }
</script>
