import Vue from '../main'

const store = {}

export default store

store.getSections = () => {
  return new Promise((resolve, reject) => {
    Vue.http({ url: 'sections', 'method': 'GET' }).then(response => {
      resolve(response.data.data)
    })
  })
}

store.getTopicsBySection = (id) => {
  return new Promise((resolve, reject) => {
    Vue.http({
      url: 'topic',
      method: 'GET',
      params: { 'section_id': id }
    }).then(response => {
      resolve(response.data.data)
    })
  })
}

store.getTopicById = (id) => {
  return new Promise((resolve, reject) => {
    Vue.http({
      url: 'topic/' + id,
      method: 'GET'
    }).then(response => {
      resolve(response.data.data)
    })
  })
}

store.replyToTopicById = (id, body) => {
  return new Promise((resolve, reject) => {
    Vue.http({
      url: 'topic/' + id + '/post',
      method: 'POST',
      data: {
        body: body
      }
    }).then(response => {
      resolve(response.data.data)
    })
  })
}

store.createTopic = (section, title, body) => {
  return new Promise((resolve, reject) => {
    Vue.http({
      url: 'topic',
      method: 'POST',
      data: {
        section_id: section,
        title: title,
        body: body,
      }
    }).then(response => {
      resolve(response.data.data)
    })
  })
}
