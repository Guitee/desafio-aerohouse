import useApi from 'src/helpers/UseApi'

export default function postService () {
  const { list, showById, remove } = useApi('posts')

  return {
    list,
    showById,
    remove
  }
}
