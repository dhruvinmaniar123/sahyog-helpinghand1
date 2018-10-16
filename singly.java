import java.util.*;
class singly
{
	Node head=null;
	Node end=null;
	class Node{
		int data;
		Node link;
		Node(int d){
			data =d;
			link=null;
		}
	}
	public static void main(String ar[]){
		singly s=new singly();
		Scanner st=new Scanner(System.in);
		int choice,in;
		while(true){
			System.out.println("\n"+"1.Insert at Front"+"\n"+"2.Delete at Front"+"\n"+"3.Insert at End"+"\n"+"4.Delete at End"+"\n"+"5.Delete element"+"\n"+"6.Exit");
			choice=st.nextInt();
			switch(choice){
				case 1:System.out.println("Enter element to insert:");
					   in=st.nextInt();
					   s.insertFront(in);
					   s.display();
					   break;
				// case 2:s.deleteFront();
				// 	   s.display();
				// 		break;
				// case 3:System.out.println("Enter element to insert:");
				// 	   in=st.nextInt();
				// 	   s.insertEnd(in);
				// 	   s.display();
				// 	   break;
				// case 4:s.deleteEnd();
				// 	   s.display();
				// 	   break;
				// case 5:System.out.println("Enter pos:");
				// 	   in=st.nextInt();
				// 	   s.deletePos(in);
				// 	   s.display();
				// 	   break;
				// case 6:System.out.println("Enter pos:");
				// 	   in=st.nextInt();
				// 	   s.search(in);
				// 	   s.display();
				// 	   break;
				default:System.out.println("Incorrect Input.");
						break;
			}
		}
	}
	public void insertFront(int info){
		Node new_node=new Node(info);
		if(head==null){
			new_node.link=null;
			head=new_node;

		}
		else{
			new_node.link=head;
			head=new_node;
		}
	}
	public void insertEnd(int info){
		Node new_node=new new_node();
		if(new_node==null){
			System.out.print("NO space");		
		}
		else{
			new_node.data=info;
			new_node.link=null;
		}
		
	}
	public void display(){
		if(head==null){
			System.out.println("No elements are present");

		}
		else{
			Node temp=head;
			while(temp!=null){
				System.out.print(temp.data+"->");
				temp=temp.link;

			}
		}
	}

}