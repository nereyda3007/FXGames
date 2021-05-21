package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesAdministradorPage;
import po.FxgamesHomePage;
import po.FxgamesPerfilPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test17 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test17";
		PropertiesManager pm = new PropertiesManager();
		pm.readProperies();
		pm.rutaEvidencias = pm.rutaEvidencias + "//"+test;
		MetodosComunes mc = new MetodosComunes();
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		pm.rutaEvidencias = mc.rewrite(pm.sobreescribir);
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		WebDriver driver = mc.setearDriver(pm.headless);
		WebDriverWait wait = mc.setearWait(driver, pm.tiempo);
		mc.maximizar(driver);
		//Se crean los mensajes para las evidencias
		String traza = "";
		String mensaje = "El producto se ha actualizado correctamente.";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Acceder a la pantalla de perfil pulsando el icono del avatar arriba a la derecha";
			home.accederPerfil();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesPerfilPage perfil = new FxgamesPerfilPage(driver, wait);
			traza = "Paso 2 => Se introduce en el campo email nereyda3007@hotmail.com";
			perfil.escribirEmailIniciar("nereyda3007@hotmail.com");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			traza = "Paso 3 => Se introduce en el campo password Dnmx75f2";
			perfil.escribirPass("Dnmx75f2");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			traza = "Paso 4 => Se pulsa en el botón Iniciar Sesión.";
			perfil.pulsarIniciarSesion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			traza = "Paso 5 => Se pulsa en en menú de la cabecera Administrador y en el submenú Administración.";
			perfil.pulsarMenuAdministrador();
			perfil.pulsarAdministracion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 5");
			FxgamesAdministradorPage admin = new FxgamesAdministradorPage(driver, wait);
			traza = "Paso 6 => Se introduce el nombre del producto Super Mario Party y el porcentaje 10  en el tercer formulario.";
			admin.escribirNomProducto("Super Mario Party");
			admin.escribirPorcentajeEspecifico("10");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 6");
			traza = "Paso 7 => Se pulsa en el botón Buscar";
			admin.pulsarBuscarProducto();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 7");
			traza = "Paso 8 => Se pulsa en el botón Confirmar";
			admin.pulsarConfirmarDesc();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 8");
			//comprobación del test
			String res="";
			if (mensaje.equals(admin.leerAlertDescAplicado())) {
				res ="OK";
				traza = "Resultado => Test OK. ";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. ";
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 17, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 17, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
