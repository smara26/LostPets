import UserController from '../controllers'

const mainPath = '/user';

const userRoutes = [
  {
    path: `${mainPath}/add`,
    method: 'POST',
    callback: () => console.log('create user')
  },
  {
    path: `${mainPath}/:id`,
    method: 'GET',
    callback: () => UserController.getUser()
  },
  {
    path: `${mainPath}/:id`,
    method: 'PUT',
    callback: () => console.log('update user by id')
  },
  {
    path: `${mainPath}/:id/notifications`,
    method: 'GET',
    callback: () => UserController.getUserNotifications()
  },
  {
    path: `${mainPath}/:id/saveLocation`,
    method: 'PUT',
    callback: () => UserController.putUserLocation()
  }
];

export default userRoutes;
