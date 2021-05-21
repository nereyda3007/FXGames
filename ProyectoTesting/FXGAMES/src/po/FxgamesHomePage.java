package po;

import java.awt.AWTException;

import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class FxgamesHomePage {
	//Declarar las variables para luego inicializar los objetos
	private WebDriver driver;
	private WebDriverWait wait;
	
	/**
	 * Declarar constructor para que reciban el driver y wait de la clase Test
	 * @param driver
	 * @param wait
	 */
	public FxgamesHomePage (WebDriver driver, WebDriverWait wait) {
		this.driver = driver;
		this.wait = wait;
	}
	
	/**
	 * Búsqueda de elementos de la página, WebElements sin valor todavía
	 */
	private By byPerfil = By.xpath("/html/body/div[2]/div/a[1]/img");
	private By byPerfil2 = By.xpath("/html/body/div[3]/div/a[1]/img");
	private By byBuscador = By.name("buscador");
	private By byContacto = By.xpath("/html/body/div[5]/div[1]/nav/ul/li[5]/a/b");
	private By byVideojuegos = By.xpath("/html/body/div[3]/nav/ul/li[1]/a/b");
	private By byVita = By.xpath("/html/body/div[3]/nav/ul/li[1]/div/a[4]");
	private WebElement perfil;
	private WebElement perfil2;
	private WebElement buscador;
	private WebElement contacto;
	private WebElement videojuegos;
	private WebElement vita;
	
	/**
	 * Métodos para interactuar con los elementos de la página arriba expuestos
	 */
	public void accederPerfil() {
		//Seteo del elemento
		perfil = driver.findElement(byPerfil);
		wait.until(ExpectedConditions.elementToBeClickable(perfil));
		perfil.click();
	}
	
	public void accederPerfil2() {
		//Seteo del elemento
		perfil2 = driver.findElement(byPerfil2);
		wait.until(ExpectedConditions.elementToBeClickable(perfil2));
		perfil2.click();
	}
	
	public void escribirBuscador(String texto) throws AWTException {
		//Seteo del elemento
		buscador = driver.findElement(byBuscador);
		wait.until(ExpectedConditions.visibilityOf(buscador));
		buscador.sendKeys(texto);
		buscador.sendKeys(Keys.ENTER);
	}
	
	public void accederContacto() {
		//Seteo del elemento
		contacto = driver.findElement(byContacto);
		wait.until(ExpectedConditions.elementToBeClickable(contacto));
		contacto.click();
	}
	
	public void pulsarVideojuegos() {
		//Seteo del elemento
		videojuegos = driver.findElement(byVideojuegos);
		wait.until(ExpectedConditions.elementToBeClickable(videojuegos));
		videojuegos.click();
	}
	
	public void pulsarVita() {
		//Seteo del elemento
		vita = driver.findElement(byVita);
		wait.until(ExpectedConditions.elementToBeClickable(vita));
		vita.click();
	}
}
