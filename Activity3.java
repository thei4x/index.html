import java.util.Scanner;
public class main{

    public static void main(String[]args){
    Scanner scanner = new Scanner(System.in);
    
    System.out.print("Enter your name: ");
    String name = scanner.nextLine();
    
    System.out.print("Enter your strand: ");
    String strand = scanner.nextLine();

    System.out.print("Enter your age: ");
    int age = scanner.nextInt();

    System.out.print("Enter your grade: ");
    int grade = scanner.nextInt();

  
    System.out.print("Your name is " + name + " age " + age + " from grade " + grade + " strand " + strand);
    }
}