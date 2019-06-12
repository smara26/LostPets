import UserModel from '../models';

const UserController = {};

UserController.getUser = (req, res) => {
  const id = req.params.id;

  UserModel
    .findById(id)
    .then(user => {
      if (user) {
        res.statusCode = 200;
        res.write(JSON.stringify(user));
      } else {
        res.statusCode = 404;
        res.write(
          JSON.stringify({
            message: 'User not found.',
            status: 'error'
          })
        );
      }
      res.end();
    })
}

UserController.getUserNotifications = (req, res) => {
  const id = req.params.id;


  // toate locatiile de la toate anunturile care nu sunt ale mele
  // verificare locatie anunt formula
  // return message: `You're close to this ${animalName}`
}

UserController.putUserLocation = (req, res) => {
  const id = req.params.id;
  let data = [];
  console.log(req);

  location = data;
  try {
    UserModel.update(location, {
      where: {
        id: id
      }
    });

    res.statusCode = 200;
  } catch (error) {
    res.statusCode = 404;
    res.write(
      JSON.stringify({
        message: 'User not found.',
        status: 'error'
      })
    );
  }
}

module.export = UserController;
