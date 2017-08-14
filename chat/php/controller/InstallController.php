<?php
class InstallController extends Controller { protected $extensions = array('PDO', 'pdo_mysql'); protected $writableFiles = array('data' => 'dir', 'upload' => 'dir', 'php/config/app.settings.php' => 'file', 'php/config/parameters.php' => 'file', 'php/config/widget.blacklist.txt' => 'file'); protected $writableFilesForVerify = array('php/config/parameters.php' => 'file'); protected $memoryServices = array('memory', 'memory.talks_map', 'memory.watched_talks', 'memory.stats', 'memory.online', 'memory.msg_q'); public function indexAction() { return $this->render('admin/install.html'); } public function verifyAction() { return $this->render('admin/install-verify.html', array('config' => $this->get('config')->data, 'trans' => json_encode($this->getJsTranslations()))); } public function verifySubmitAction() { $spd2c11b = $this->get('request'); $sp5ddf91 = $this->get('verify'); $spd9ce6b = $spd2c11b->postVar('config'); $sp4f3367 = $spd9ce6b['services']['verify']['code']; $spd46846 = $spd9ce6b['services']['verify']['token']; $sp12086a = array(); foreach ($this->writableFilesForVerify as $sp0309d9 => $sp27e0fc) { if (!is_writable(ROOT_DIR . '/../' . $sp0309d9)) { $sp12086a[$sp0309d9] = $sp27e0fc; } } if (!empty($sp12086a)) { return $this->render('admin/install-verify.html', array('config' => $this->get('config')->data, 'notWritable' => $sp12086a, 'trans' => json_encode($this->getJsTranslations()))); } if ($sp5ddf91->verifyCodeToken($sp4f3367, $spd46846)) { $sp5ddf91->updateInstallation($sp4f3367, $spd46846); return $this->redirect('Install:wizard'); } return $this->redirect('Install:verify'); } public function wizardAction() { ini_set('opcache.enable', 0); if (!$this->get('verify')->verifyInstallation()) { return $this->redirect('Install:verify'); } $sp66bd66 = $this->get('config')->data; return $this->render('admin/install-wizard.html', array('config' => $sp66bd66)); } public function wizard2Action() { $spd2c11b = $this->get('request'); $sp950298 = $this->get('config'); $sp66bd66 = $spd2c11b->postVar('config'); $sp486313 = $this->ensureValidConfig(); if (!empty($sp486313)) { return $sp486313; } $sp949b29 = array(); foreach ($this->extensions as $sp7121ac) { if (!extension_loaded($sp7121ac)) { $sp949b29[] = $sp7121ac; } } if (!empty($sp949b29)) { return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'missingExtensions' => $sp949b29)); } $sp12086a = array(); foreach ($this->writableFiles as $sp0309d9 => $sp27e0fc) { if (!is_writable(ROOT_DIR . '/../' . $sp0309d9)) { $sp12086a[$sp0309d9] = $sp27e0fc; } } if (!empty($sp12086a)) { return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'notWritable' => $sp12086a)); } if (!$this->createMemoryFiles()) { return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'notWritable' => array('data' => 'dir'))); } $spaf10ed = false; $sp3b767b = $sp950298->data['dbType'] . ':host=' . $sp66bd66['dbHost'] . ';port=' . $sp66bd66['dbPort']; try { $sp950298->data['appSettings']['installed'] = false; if (!$this->get('db')->connect($sp3b767b, $sp66bd66['dbUser'], $sp66bd66['dbPassword'])) { $spaf10ed = true; } } catch (Exception $spbaa11e) { $spaf10ed = true; } if ($spaf10ed) { return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'dbError' => $spaf10ed)); } return $this->render('admin/install-wizard-2.html', array('config' => $sp66bd66)); } public function wizard3Action() { $spd2c11b = $this->get('request'); $sp950298 = $this->get('config'); $sp66bd66 = $spd2c11b->postVar('config'); $sp486313 = $this->ensureValidConfig(); if (!empty($sp486313)) { return $sp486313; } unset($sp66bd66['superPassRepeat']); $spa58e5f = $this->get('config'); $spa58e5f->updateParameters($sp66bd66); $spa58e5f->updateAppSettings($sp66bd66['appSettings']); ini_set('opcache.enable', 0); $spa58e5f->onRegister(); $spab517f = $this->install(); if (!$spab517f['success']) { $sp1bae69 = true; $sp5ce989 = $spab517f['message']; return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'dbCreateError' => $sp1bae69, 'message' => $sp5ce989)); } $spdbcc02 = $this->get('model_validation')->validateDb(); if (count($spdbcc02) !== 0) { $sp1bae69 = true; $sp5ce989 = $spdbcc02['message']; return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'dbCreateError' => $sp1bae69, 'message' => $sp5ce989)); } $this->get('logger')->info('Application installed'); return $this->render('admin/install-wizard-3.html'); } public function uninstallAction() { return $this->render('admin/uninstall.html'); } public function uninstall2Action() { $spd2c11b = $this->get('request'); if (!$spd2c11b->isPost()) { return $this->redirect('Install:uninstall'); } $spab517f = $this->uninstall(); if (!$spab517f['success']) { $spa8aeae = true; $spa3a833 = $spab517f['errorMsg']; return $this->render('admin/uninstall.html', array('error' => $spa8aeae, 'errorMsg' => $spa3a833)); } $this->get('logger')->info('Application uninstalled'); return $this->render('admin/uninstall-2.html'); } protected function createMemoryFiles() { $spab517f = true; foreach ($this->memoryServices as $spf69fc1) { if (!touch($this->get($spf69fc1)->getFilePath())) { $spab517f = false; } } return $spab517f; } protected function ensureValidConfig() { $spd2c11b = $this->get('request'); if ($spd2c11b->isPost()) { $sp66bd66 = $spd2c11b->postVar('config'); $sp4506ef = $this->get('model_validation'); $spdbcc02 = $sp4506ef->validateInstallConfig($sp66bd66); if (count($spdbcc02) !== 0) { return $this->render('admin/install-wizard.html', array('config' => $sp66bd66, 'errors' => $spdbcc02)); } } else { return $this->redirect('Install:wizard'); } return null; } protected function install() { $sp50d6dd = array('message' => ''); if ($this->get('request')->isPost()) { $sp66bd66 = $this->get('config'); try { $sp23aa86 = file_get_contents(ROOT_DIR . '/../sql/install_' . $sp66bd66->data['dbType'] . '.sql'); $sp23aa86 = str_replace('%db_name%', $sp66bd66->data['dbName'], $sp23aa86); $sp66bd66->data['appSettings']['installed'] = false; $sp50d6dd['success'] = $this->get('db')->execute($sp23aa86); } catch (Exception $sp4327c2) { $sp50d6dd['success'] = false; $sp50d6dd['message'] = $sp4327c2->getMessage(); } if ($sp50d6dd['success']) { $sp66bd66->updateAppSettings(array('installed' => true)); $sp50d6dd = $this->createAdmin($sp66bd66); if ($sp50d6dd['success']) { $sp55dae4 = $sp50d6dd['admin']; $this->get('auth')->setUser($sp55dae4->id, $sp55dae4->name, $sp55dae4->roles); } } else { if (empty($sp50d6dd['message'])) { $sp50d6dd['message'] = $this->get('i18n')->trans('other.error'); } } } return $sp50d6dd; } protected function createAdmin($sp66bd66) { $sp50d6dd = array('message' => ''); $this->get('db')->reconnect(); $sp55dae4 = UserModel::repo()->findOneBy(array('roles' => array('Like', '%ADMIN%'))); if (!$sp55dae4) { $sp55dae4 = new UserModel(array('roles' => array('ADMIN', 'OPERATOR'), 'info' => array('ip' => $this->get('request')->getIp()))); } $sp55dae4->name = $sp66bd66->data['superUser']; $sp55dae4->mail = $sp66bd66->data['superUser']; $sp55dae4->password = $this->get('security')->encodePassword($sp66bd66->data['superPass']); if ($sp55dae4->save()) { $sp50d6dd['success'] = true; $sp50d6dd['admin'] = $sp55dae4; } else { $sp50d6dd['success'] = false; $sp50d6dd['message'] = $this->get('i18n')->trans('admin.update.error'); } return $sp50d6dd; } protected function uninstall() { $sp50d6dd = array(); if ($this->get('request')->isPost()) { $sp66bd66 = $this->get('config'); try { $sp23aa86 = file_get_contents(ROOT_DIR . '/../sql/uninstall_' . $sp66bd66->data['dbType'] . '.sql'); $sp23aa86 = str_replace('%db_name%', $sp66bd66->data['dbName'], $sp23aa86); $sp50d6dd['success'] = $this->get('db')->execute($sp23aa86); } catch (Exception $sp4327c2) { $sp50d6dd['success'] = false; $sp50d6dd['errorMsg'] = $sp4327c2->getMessage(); } if ($sp50d6dd['success']) { $sp3ac102 = array('id' => '-1', 'name' => $sp66bd66->data['superUser'], 'roles' => array('ADMIN')); $this->get('auth')->setUser($sp3ac102['id'], $sp3ac102['name'], $sp3ac102['roles']); $sp66bd66 = $this->get('config'); $sp66bd66->updateAppSettings(array('installed' => false)); $sp66bd66->updateParameters(array('superPass' => '')); } else { $sp50d6dd['error'] = $sp50d6dd['errorMsg'] = $this->get('i18n')->trans('uninstall.error'); } } return $sp50d6dd; } protected function getJsTranslations() { $sp704af3 = $this->get('i18n'); return array('connection.error' => $sp704af3->trans('connection.error'), 'invalid.code.format' => $sp704af3->trans('invalid.code.format'), 'invalid.purchase' => $sp704af3->trans('invalid.purchase')); } }