<?php
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $phone;
    public $email;
    public $password;
    public $verifyCode;
    public $password_repeat;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username','password'], 'required'],
            //  ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 4, 'max' => 655],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'This email address has already been taken.'],
            ['email', 'email','message'=>'Неправильный формат e-mail адреса! '],
            ['email', 'string', 'max' => 255],
            ['password', 'string', 'min' => 4],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if ($this->validate())  {
            $user = new User();
            $user->username = $this->username;
            $user->phone = $this->phone;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = 1; //$user->status = User::STATUS_WAIT;
            $user->generateAuthKey();
            $user->generateEmailConfirmToken();



            if ($user->save()) {

                // нужно добавить следующие три строки:
              //   $auth = Yii::$app->authManager;
               //  $authorRole = $auth->getRole('superadmin');
               //  $auth->assign($authorRole, $user->getId());

                /*
                Yii::$app->mailer->compose('@app/modules/user/mails/emailConfirm', ['user' => $user])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('Email confirmation for ' . Yii::$app->name)
                    ->send();*/
                return $user;
            }else{
                print_arr($user->errors);
                die('S');
            }
        }

        return null;
    }

    // редактирования профиль;
    public  function updateProfile() {
        $modelPopup = User::findOne(Yii::$app->user->id);
        if ($modelPopup->validate())  {
            die('SAVE');
            $modelPopup->username = $this->username;
            $modelPopup->phone = $this->phone;
            $modelPopup->email = $this->email;
            $modelPopup->setPassword($this->password);

            /*
            if ($modelPopup->save()) {
                return $modelPopup;
            }*/
        }
        return $modelPopup;
    }
}