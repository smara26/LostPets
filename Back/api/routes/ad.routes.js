const mainPath = '/ad';

const adRoutes = [
  {
    path: `${mainPath}s`,
    method: 'GET',
    callback: () => console.log('get all ads')
  },
  {
    path: `${mainPath}`,
    method: 'POST',
    callback: () => console.log('create ad')
  },
  {
    path: `${mainPath}/:id`,
    method: 'GET',
    callback: () => console.log('read ad by id')
  },
  {
    path: `${mainPath}/:id`,
    method: 'PUT',
    callback: () => console.log('update ad by id')
  },
  {
    path: `${mainPath}/:id`,
    method: 'DELETE',
    callback: () => console.log('delete ad by id')
  }
];

export default adRoutes;
