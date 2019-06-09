import Sequelize from 'sequelize';

const Ad = sequelize => {
  ad = sequelize.define('ad', {
    id: {
      type: Sequelize.INTEGER(10),
      primaryKey: true,
      autoIncrement: true
    },
    name: Sequelize.STRING(30),
    breed: Sequelize.STRING(30),
    disappearance_date: Sequelize.DATE,
    marks: {
      type: Sequelize.STRING(50),
      allowNull: true
    },
    collar: {
      type: Sequelize.STRING(50),
      allowNull: true
    },
    last_seen_place: Sequelize.STRING(100),
    last_modify_date: Sequelize.DATE,
    picture: Sequelize.STRING(50),
    details: {
      type: Sequelize.STRING(300),
      allowNull: true
    },
    owner: Sequelize.STRING(30),
    phone: Sequelize.STRING(30),
    mail: Sequelize.STRING(30),
    reward: {
      type: Sequelize.INTEGER(10),
      allowNull: true
    },
    found: {
      type: Sequelize.TINYINT(1),
      defaultValue: 0
    }
  });

  sequelize.sync();
  return ad;
};

export default Ad;
